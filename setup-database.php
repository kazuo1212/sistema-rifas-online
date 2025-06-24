<?php
/**
 * Script para inicializar o banco de dados no Railway
 * Execute uma vez após o deploy: php setup-database.php
 */

require_once 'extrair/initialize.php';

echo "🚂 Iniciando setup do banco de dados Railway...\n";

try {
    // Conectar ao MySQL
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    
    if ($conn->connect_error) {
        throw new Exception("Erro de conexão: " . $conn->connect_error);
    }
    
    echo "✅ Conectado ao MySQL\n";
    
    // Criar database se não existir
    $sql = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if ($conn->query($sql)) {
        echo "✅ Database '" . DB_NAME . "' criado/verificado\n";
    }
    
    // Selecionar database
    $conn->select_db(DB_NAME);
    
    // Executar script SQL
    $sqlFile = 'extrair/banco.sql';
    if (file_exists($sqlFile)) {
        $sql = file_get_contents($sqlFile);
        
        // Dividir em comandos individuais
        $commands = array_filter(array_map('trim', explode(';', $sql)));
        
        foreach ($commands as $command) {
            if (!empty($command) && !preg_match('/^(\/\*|--|\#)/', $command)) {
                if ($conn->query($command)) {
                    echo "✅ Comando SQL executado\n";
                } else {
                    echo "⚠️  Erro SQL: " . $conn->error . "\n";
                }
            }
        }
        
        echo "✅ Banco de dados inicializado!\n";
    } else {
        echo "❌ Arquivo banco.sql não encontrado\n";
    }
    
    // Verificar tabelas criadas
    $result = $conn->query("SHOW TABLES");
    $tables = [];
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
    
    echo "📊 Tabelas criadas: " . implode(', ', $tables) . "\n";
    
    // Criar usuário admin padrão se não existir
    $adminCheck = $conn->query("SELECT id FROM users WHERE username = 'admin'");
    if ($adminCheck->num_rows == 0) {
        $adminPassword = password_hash('albinodevs', PASSWORD_DEFAULT);
        $adminSql = "INSERT INTO users (firstname, lastname, username, password, type, date_created) 
                     VALUES ('Admin', 'Sistema', 'admin', '$adminPassword', 1, NOW())";
        
        if ($conn->query($adminSql)) {
            echo "✅ Usuário admin criado (senha: albinodevs)\n";
        }
    }
    
    echo "🎉 Setup completo! Seu sistema está pronto.\n";
    
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
    exit(1);
}
?> 
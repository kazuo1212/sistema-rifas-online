<?php
// Configurações básicas para Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Carregar variáveis de ambiente
$db_host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?? 'localhost';
$db_user = $_ENV['DB_USER'] ?? getenv('DB_USER') ?? 'root';
$db_pass = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?? '';
$db_name = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?? 'sistema_rifas';

echo "<!DOCTYPE html>";
echo "<html><head><title>Sistema de Rifas - Online!</title></head><body>";
echo "<h1>🎉 Sistema de Rifas - Railway Deploy</h1>";
echo "<p><strong>Status:</strong> Online e funcionando!</p>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Server Time:</strong> " . date('Y-m-d H:i:s') . "</p>";

// Teste de conexão com banco
echo "<h3>📊 Database Test:</h3>";
echo "<p><strong>DB Host:</strong> " . $db_host . "</p>";
echo "<p><strong>DB User:</strong> " . $db_user . "</p>";
echo "<p><strong>DB Name:</strong> " . $db_name . "</p>";

try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        echo "<p style='color: red;'><strong>❌ Erro de conexão:</strong> " . $conn->connect_error . "</p>";
    } else {
        echo "<p style='color: green;'><strong>✅ Conexão MySQL:</strong> Sucesso!</p>";
        
        // Verificar se existem tabelas
        $result = $conn->query("SHOW TABLES");
        if ($result && $result->num_rows > 0) {
            echo "<p><strong>📋 Tabelas encontradas:</strong> " . $result->num_rows . "</p>";
        } else {
            echo "<p style='color: orange;'><strong>⚠️ Aviso:</strong> Nenhuma tabela encontrada. Execute /setup-database.php</p>";
        }
        $conn->close();
    }
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>❌ Erro:</strong> " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h3>🔗 Links Importantes:</h3>";
echo "<ul>";
echo "<li><a href='/test.php'>Teste PHP Simples</a></li>";
echo "<li><a href='/setup-database.php'>Setup Database</a></li>";
echo "<li><a href='/admin'>Painel Admin</a></li>";
echo "</ul>";

echo "<hr>";
echo "<p><small>🚂 Powered by Railway | 🎲 Sistema de Rifas Online</small></p>";
echo "</body></html>";
?> 
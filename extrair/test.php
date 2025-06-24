<?php
echo "Sistema de Rifas - Online!";
echo "<br>PHP Version: " . phpversion();
echo "<br>Server Time: " . date('Y-m-d H:i:s');

// Teste de conexão com banco
if (isset($_ENV['DB_HOST'])) {
    echo "<br>DB Host: " . $_ENV['DB_HOST'];
    echo "<br>Status: Railway configurado!";
} else {
    echo "<br>Status: Variáveis de ambiente não encontradas";
}
?> 
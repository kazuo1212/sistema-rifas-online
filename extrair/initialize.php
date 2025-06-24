<?php
$date_expirate = '9999-99-99';

if ($date_expirate == date('Y-m-d')) {
?>
    <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center;flex-direction: column;">

        <h1>Pagamento não identificado!</h1>
        <div>
            <span>Entre em contato com o adminstrador do site.</span>
        </div>
    </div>

<?php

} else {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(1);
    
    // Configurações para Railway
    $railway_url = isset($_SERVER['RAILWAY_PUBLIC_DOMAIN']) ? 'https://' . $_SERVER['RAILWAY_PUBLIC_DOMAIN'] : 'http://localhost';
    
    // URLs do sistema
    if (!defined('BASE_URL')) define('BASE_URL', $railway_url . '/');
    if (!defined('BASE_REF')) define('BASE_REF', $railway_url);
    if (!defined('base_url')) define('base_url', $railway_url . '/');
    if (!defined('base_app')) define('base_app', str_replace('\\', '/', __DIR__) . '/');
    if (!defined('BASE_APP')) define('BASE_APP', str_replace('\\', '/', __DIR__) . '/');
    
    // Configurações do banco de dados Railway
    if (!defined('DB_SERVER')) define('DB_SERVER', $_ENV['DB_HOST'] ?? 'localhost');
    if (!defined('DB_USERNAME')) define('DB_USERNAME', $_ENV['DB_USER'] ?? 'root');
    if (!defined('DB_PASSWORD')) define('DB_PASSWORD', $_ENV['DB_PASSWORD'] ?? '');
    if (!defined('DB_NAME')) define('DB_NAME', $_ENV['DB_NAME'] ?? 'rifas');
    
    // Configurações adicionais para produção
    if (isset($_SERVER['RAILWAY_ENVIRONMENT'])) {
        // Configurações de segurança para produção
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
        
        // Configurar timezone
        date_default_timezone_set('America/Sao_Paulo');
    }
}

?>
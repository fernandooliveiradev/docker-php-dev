<?php
/**
 * Script de teste do ambiente PHP com Docker
 * Este script verifica se todas as configurações estão funcionando corretamente
 */

// Iniciar buffer de saída
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🧪 Teste do Ambiente PHP com Docker</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-primary: #0d1117;
            --bg-secondary: #1c2128;
            --bg-tertiary: #30363d;
            --border-color: #484f58;
            --text-primary: #ffffff;
            --text-secondary: #c9d1d9;
            --accent-color: #58a6ff;
            --success-color: #3fb950;
            --warning-color: #d29922;
            --danger-color: #f85149;
            --card-bg: #161b22;
        }
        
        body {
            background-color: var(--bg-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-primary);
            line-height: 1.6;
            padding: 2rem 0;
        }
        
        .container {
            max-width: 1000px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--accent-color);
        }
        
        .header p {
            font-size: 1.1rem;
            color: var(--text-secondary);
        }
        
        .test-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .test-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .test-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .test-icon {
            font-size: 1.5rem;
            margin-right: 0.75rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .test-icon.success {
            background-color: rgba(63, 185, 80, 0.2);
            color: var(--success-color);
        }
        
        .test-icon.error {
            background-color: rgba(248, 81, 73, 0.2);
            color: var(--danger-color);
        }
        
        .test-icon.warning {
            background-color: rgba(210, 153, 34, 0.2);
            color: var(--warning-color);
        }
        
        .test-icon.info {
            background-color: rgba(88, 166, 255, 0.2);
            color: var(--accent-color);
        }
        
        .test-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }
        
        .test-content {
            padding-left: 3.25rem;
        }
        
        .test-item {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
        }
        
        .test-item i {
            margin-right: 0.5rem;
            margin-top: 0.25rem;
            flex-shrink: 0;
        }
        
        .test-item.success i {
            color: var(--success-color);
        }
        
        .test-item.error i {
            color: var(--danger-color);
        }
        
        .test-item.warning i {
            color: var(--warning-color);
        }
        
        .test-item.info i {
            color: var(--accent-color);
        }
        
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }
        
        .footer h3 {
            color: var(--success-color);
            margin-bottom: 1rem;
        }
        
        .footer p {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }
        
        .footer a {
            color: var(--accent-color);
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        .badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }
        
        .badge-success {
            background-color: rgba(63, 185, 80, 0.2);
            color: var(--success-color);
        }
        
        .badge-error {
            background-color: rgba(248, 81, 73, 0.2);
            color: var(--danger-color);
        }
        
        .badge-warning {
            background-color: rgba(210, 153, 34, 0.2);
            color: var(--warning-color);
        }
        
        .badge-info {
            background-color: rgba(88, 166, 255, 0.2);
            color: var(--accent-color);
        }
        
        .code-block {
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            padding: 0.75rem;
            font-family: 'Consolas', 'Monaco', monospace;
            font-size: 0.875rem;
            margin: 0.5rem 0;
            overflow-x: auto;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .test-content {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🧪 Teste do Ambiente PHP com Docker</h1>
            <p>Verificação do funcionamento do ambiente de desenvolvimento</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <!-- Teste 1: PHP -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon success">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <h3 class="test-title">PHP</h3>
                    </div>
                    <div class="test-content">
                        <div class="test-item success">
                            <i class="bi bi-check-circle-fill"></i>
                            <div>
                                <strong>PHP está funcionando</strong>
                                <div class="text-secondary">Versão: <?php echo PHP_VERSION; ?></div>
                                <div class="text-secondary">SAPI: <?php echo php_sapi_name(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Teste 2: Extensões PHP -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon <?php echo empty($missing_extensions) ? 'success' : 'error'; ?>">
                            <i class="bi bi-<?php echo empty($missing_extensions) ? 'check-circle-fill' : 'x-circle-fill'; ?>"></i>
                        </div>
                        <h3 class="test-title">Extensões PHP</h3>
                    </div>
                    <div class="test-content">
                        <?php
                        $required_extensions = ['pdo_mysql', 'mysqli', 'gd', 'zip', 'xml', 'curl', 'openssl', 'intl', 'bcmath', 'imagick'];
                        $missing_extensions = [];
                        
                        foreach ($required_extensions as $ext) {
                            if (!extension_loaded($ext)) {
                                $missing_extensions[] = $ext;
                            }
                        }
                        
                        if (empty($missing_extensions)) {
                            echo '<div class="test-item success">
                                <i class="bi bi-check-circle-fill"></i>
                                <div><strong>Todas as extensões PHP necessárias estão instaladas</strong></div>
                            </div>';
                        } else {
                            echo '<div class="test-item error">
                                <i class="bi bi-x-circle-fill"></i>
                                <div><strong>Extensões faltando:</strong> ' . implode(', ', $missing_extensions) . '</div>
                            </div>';
                        }
                        
                        // OPcache é opcional (já vem compilado com PHP 8.3+)
                        if (extension_loaded('opcache')) {
                            echo '<div class="test-item success">
                                <i class="bi bi-check-circle-fill"></i>
                                <div><strong>OPcache está habilitado</strong></div>
                            </div>';
                        } else {
                            echo '<div class="test-item info">
                                <i class="bi bi-info-circle-fill"></i>
                                <div><strong>OPcache não está carregado como extensão</strong> (normal - vem compilado com PHP)</div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Teste 3: Configurações UTF-8 -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon info">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <h3 class="test-title">Configurações UTF-8</h3>
                    </div>
                    <div class="test-content">
                        <div class="test-item info">
                            <i class="bi bi-gear-fill"></i>
                            <div>
                                <strong>Configurações:</strong>
                                <div class="code-block">
                                    default_charset: <?php echo ini_get('default_charset'); ?><br>
                                    mbstring.internal_encoding: <?php echo ini_get('mbstring.internal_encoding'); ?><br>
                                    date.timezone: <?php echo ini_get('date.timezone'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Teste 4: Conexão com MySQL -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon <?php echo isset($pdo) ? 'success' : 'error'; ?>">
                            <i class="bi bi-<?php echo isset($pdo) ? 'check-circle-fill' : 'x-circle-fill'; ?>"></i>
                        </div>
                        <h3 class="test-title">Conexão com MySQL</h3>
                    </div>
                    <div class="test-content">
                        <?php
                        $mysql_config = [
                            'host' => $_ENV['MYSQL_HOST'] ?? 'mysql',
                            'dbname' => $_ENV['MYSQL_DATABASE'] ?? 'app_db',
                            'user' => $_ENV['MYSQL_USER'] ?? 'app_user',
                            'password' => $_ENV['MYSQL_PASSWORD'] ?? 'app_password'
                        ];
                        
                        try {
                            $pdo = new PDO(
                                "mysql:host={$mysql_config['host']};dbname={$mysql_config['dbname']};charset=utf8mb4",
                                $mysql_config['user'],
                                $mysql_config['password'],
                                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                            );
                            
                            echo '<div class="test-item success">
                                <i class="bi bi-check-circle-fill"></i>
                                <div><strong>Conexão MySQL bem-sucedida</strong></div>
                            </div>';
                            
                            // Testar consulta
                            $stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            echo '<div class="test-item success">
                                <i class="bi bi-database"></i>
                                <div>Total de usuários na tabela: <span class="badge badge-success">' . $result['total'] . '</span></div>
                            </div>';
                            
                            // Testar tabela leads
                            $stmt = $pdo->query("SELECT COUNT(*) as total FROM leads");
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            echo '<div class="test-item success">
                                <i class="bi bi-database"></i>
                                <div>Total de leads na tabela: <span class="badge badge-success">' . $result['total'] . '</span></div>
                            </div>';
                            
                        } catch (PDOException $e) {
                            echo '<div class="test-item error">
                                <i class="bi bi-x-circle-fill"></i>
                                <div><strong>Erro na conexão MySQL:</strong> ' . $e->getMessage() . '</div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Teste 5: GD (manipulação de imagens) -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon <?php echo extension_loaded('gd') ? 'success' : 'error'; ?>">
                            <i class="bi bi-<?php echo extension_loaded('gd') ? 'check-circle-fill' : 'x-circle-fill'; ?>"></i>
                        </div>
                        <h3 class="test-title">Extensão GD</h3>
                    </div>
                    <div class="test-content">
                        <?php
                        if (extension_loaded('gd')) {
                            $gd_info = gd_info();
                            echo '<div class="test-item success">
                                <i class="bi bi-check-circle-fill"></i>
                                <div><strong>GD está instalado</strong></div>
                            </div>';
                            
                            echo '<div class="test-item info">
                                <i class="bi bi-info-circle"></i>
                                <div>
                                    <strong>Informações:</strong>
                                    <div class="code-block">';
                            echo 'Versão: ' . $gd_info['GD Version'] . '<br>';
                            echo 'Suporte JPEG: ' . ($gd_info['JPEG Support'] ? 'Sim' : 'Não') . '<br>';
                            echo 'Suporte PNG: ' . ($gd_info['PNG Support'] ? 'Sim' : 'Não') . '<br>';
                            echo 'Suporte WebP: ' . ($gd_info['WebP Support'] ? 'Sim' : 'Não');
                            echo '</div>
                                </div>
                            </div>';
                        } else {
                            echo '<div class="test-item error">
                                <i class="bi bi-x-circle-fill"></i>
                                <div><strong>GD não está instalado</strong></div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Teste 6: cURL -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon <?php echo extension_loaded('curl') ? 'success' : 'error'; ?>">
                            <i class="bi bi-<?php echo extension_loaded('curl') ? 'check-circle-fill' : 'x-circle-fill'; ?>"></i>
                        </div>
                        <h3 class="test-title">Extensão cURL</h3>
                    </div>
                    <div class="test-content">
                        <?php
                        if (extension_loaded('curl')) {
                            $curl_version = curl_version();
                            echo '<div class="test-item success">
                                <i class="bi bi-check-circle-fill"></i>
                                <div><strong>cURL está instalado</strong></div>
                            </div>';
                            
                            echo '<div class="test-item info">
                                <i class="bi bi-info-circle"></i>
                                <div>Versão: <span class="badge badge-info">' . $curl_version['version'] . '</span></div>
                            </div>';
                        } else {
                            echo '<div class="test-item error">
                                <i class="bi bi-x-circle-fill"></i>
                                <div><strong>cURL não está instalado</strong></div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Teste 7: Imagick -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon <?php echo extension_loaded('imagick') ? 'success' : 'error'; ?>">
                            <i class="bi bi-<?php echo extension_loaded('imagick') ? 'check-circle-fill' : 'x-circle-fill'; ?>"></i>
                        </div>
                        <h3 class="test-title">Extensão Imagick</h3>
                    </div>
                    <div class="test-content">
                        <?php
                        if (extension_loaded('imagick')) {
                            $imagick = new Imagick();
                            $version = $imagick->getVersion();
                            echo '<div class="test-item success">
                                <i class="bi bi-check-circle-fill"></i>
                                <div><strong>Imagick está instalado</strong></div>
                            </div>';
                            
                            echo '<div class="test-item info">
                                <i class="bi bi-info-circle"></i>
                                <div>Versão: <span class="badge badge-info">' . $version['versionString'] . '</span></div>
                            </div>';
                        } else {
                            echo '<div class="test-item error">
                                <i class="bi bi-x-circle-fill"></i>
                                <div><strong>Imagick não está instalado</strong></div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Teste 8: Configurações de upload -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon info">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <h3 class="test-title">Configurações de Upload</h3>
                    </div>
                    <div class="test-content">
                        <div class="test-item info">
                            <i class="bi bi-gear-fill"></i>
                            <div>
                                <strong>Limites:</strong>
                                <div class="code-block">
                                    upload_max_filesize: <?php echo ini_get('upload_max_filesize'); ?><br>
                                    post_max_size: <?php echo ini_get('post_max_size'); ?><br>
                                    memory_limit: <?php echo ini_get('memory_limit'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Teste 9: Diretórios -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon info">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <h3 class="test-title">Diretórios</h3>
                    </div>
                    <div class="test-content">
                        <?php
                        $directories = [
                            '/var/lib/php/sessions' => 'Diretório de sessões',
                            '/var/www/html' => 'Diretório web',
                            '/var/log' => 'Diretório de logs'
                        ];
                        
                        foreach ($directories as $dir => $description) {
                            if (is_dir($dir)) {
                                echo '<div class="test-item success">
                                    <i class="bi bi-folder-fill"></i>
                                    <div>
                                        <strong>' . $description . '</strong> existe: ' . $dir;
                                        if (is_writable($dir)) {
                                            echo '<div class="text-success"><i class="bi bi-check-circle-fill"></i> Escrita permitida</div>';
                                        } else {
                                            echo '<div class="text-warning"><i class="bi bi-exclamation-triangle-fill"></i> Escrita NÃO permitida</div>';
                                        }
                                        echo '</div>
                                    </div>';
                            } else {
                                echo '<div class="test-item error">
                                    <i class="bi bi-x-circle-fill"></i>
                                    <div><strong>' . $description . '</strong> não existe: ' . $dir . '</div>
                                </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <h3>🎉 Teste concluído!</h3>
            <p>Se todos os testes passaram, seu ambiente está pronto para uso!</p>
            <p><a href="http://localhost:<?php echo $_ENV['NGINX_PORT'] ?? '8080'; ?>" target="_blank">Acessar Aplicação</a></p>
            <p><a href="http://localhost:<?php echo $_ENV['PHPMYADMIN_PORT'] ?? '8081'; ?>" target="_blank">Acessar phpMyAdmin</a></p>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Enviar o buffer de saída
ob_end_flush();
?>
<?php
// Prevent direct access
if (!defined('APP_INIT')) {
    die('Direct access not permitted');
}

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Asia/Yangon');

// Base directory (only if not already defined)
if (!defined('BASE_DIR')) {
    define('BASE_DIR', dirname(__DIR__));
}

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_blog');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Smarty Configuration
define('SMARTY_TEMPLATE_DIR', BASE_DIR . '/templates/');
define('SMARTY_COMPILE_DIR', BASE_DIR . '/templates_c/');
define('SMARTY_CACHE_DIR', BASE_DIR . '/cache/');

// Auto-create directories if they don't exist
$dirs = [SMARTY_COMPILE_DIR, SMARTY_CACHE_DIR];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Site Configuration
define('SITE_NAME', 'My Blog - Myanmar');

// Application Settings
define('DEBUG_MODE', true); // Set to false for production

// POSTS PER PAGE for Pagination
define('POSTS_PER_PAGE', 3); // <<< Add this line

// Auto-detect URL
if (php_sapi_name() === 'cli-server') {
    define('SITE_URL', 'http://localhost:8000/');
} else {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $script = dirname($_SERVER['SCRIPT_NAME']);
    $base = ($script === '/' || $script === '\\') ? '/' : rtrim($script, '/') . '/';
    define('SITE_URL', $protocol . $host . $base);
}
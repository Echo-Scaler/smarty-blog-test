<?php
/**
 * Main Entry Point - Smarty 4.5.6 Compatible
 * This version works with Smarty 4.x installed via Composer
 */

// Start session
session_start();

// Define app constant
define('APP_INIT', true);

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Base directory
define('BASE_DIR', dirname(__DIR__));

// =============================================
// LOAD COMPOSER AUTOLOAD
// =============================================
$autoload_path = BASE_DIR . '/vendor/autoload.php';

if (!file_exists($autoload_path)) {
    die('ERROR: vendor/autoload.php not found. Run: composer install');
}

require_once $autoload_path;

// =============================================
// MANUALLY LOAD SMARTY CLASS
// =============================================
// Smarty 4.x stores the main class in libs/Smarty.class.php
$smarty_class = BASE_DIR . '/vendor/smarty/smarty/libs/Smarty.class.php';

if (!file_exists($smarty_class)) {
    die('ERROR: Smarty.class.php not found at: ' . $smarty_class);
}

// Manually require the Smarty class file
require_once $smarty_class;

// Verify Smarty class is now available
if (!class_exists('Smarty')) {
    die('ERROR: Smarty class still not available after manual include');
}

// =============================================
// LOAD CONFIG
// =============================================
require_once BASE_DIR . '/config/config.php';

// =============================================
// LOAD BLOG CLASS
// =============================================
require_once BASE_DIR . '/src/Blog.php';

use App\Blog;

try {
    // =============================================
    // CREATE SMARTY OBJECT (Smarty 4.x style)
    // =============================================
    
    $smarty = new Smarty();  // Note: NO namespace for Smarty 4.x
    
    // Set directories
    $smarty->setTemplateDir(SMARTY_TEMPLATE_DIR);
    $smarty->setCompileDir(SMARTY_COMPILE_DIR);
    $smarty->setCacheDir(SMARTY_CACHE_DIR);
    
    // Smarty 4.x settings (using properties, not methods)
    $smarty->force_compile = true;
    $smarty->caching = Smarty::CACHING_OFF;
    $smarty->compile_check = true;
    
    // Verify directories exist
    if (!is_dir(SMARTY_TEMPLATE_DIR)) {
        die('ERROR: Templates directory not found: ' . SMARTY_TEMPLATE_DIR);
    }
    
    if (!is_writable(SMARTY_COMPILE_DIR)) {
        die('ERROR: templates_c not writable. Fix permissions.');
    }
    
    // Assign global variables
    $smarty->assign('site_name', SITE_NAME);
    $smarty->assign('base_url', SITE_URL);
    
    // Initialize Blog
    $blog = new Blog($smarty);
    
    // Get page parameter
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    
    // Routing
    switch ($page) {
        case 'post':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $post = $blog->getPostById($id);
            
            $smarty->assign('post', $post);
            $smarty->assign('page_title', $post ? $post['title'] : 'Not Found');
            
            if (!file_exists(SMARTY_TEMPLATE_DIR . 'post.tpl')) {
                die('ERROR: templates/post.tpl not found');
            }
            
            $smarty->display('post.tpl');
            break;
            
        case 'home':
        default:
            $posts = $blog->getPosts();
            
            $smarty->assign('posts', $posts);
            $smarty->assign('page_title', 'Home');
            
            if (!file_exists(SMARTY_TEMPLATE_DIR . 'index.tpl')) {
                die('ERROR: templates/index.tpl not found');
            }
            
            $smarty->display('index.tpl');
            break;
    }
    
} catch (Exception $e) {
    echo '<h1>❌ Error Occurred</h1>';
    echo '<p><strong>Type:</strong> ' . get_class($e) . '</p>';
    echo '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ' : Line ' . $e->getLine() . '</p>';
    
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        echo '<h2>Stack Trace:</h2>';
        echo '<pre style="background:#f5f5f5; padding:15px; overflow:auto;">';
        echo htmlspecialchars($e->getTraceAsString());
        echo '</pre>';
    }
}
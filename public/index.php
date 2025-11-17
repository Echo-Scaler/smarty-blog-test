<?php
/**
 * Main Entry Point - With Pagination
 */

session_start();

define('APP_INIT', true);

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_DIR', dirname(__DIR__));

// Load autoload
require_once BASE_DIR . '/vendor/autoload.php';

// Load Smarty 4.x
$smarty_class = BASE_DIR . '/vendor/smarty/smarty/libs/Smarty.class.php';
if (file_exists($smarty_class)) {
    require_once $smarty_class;
}

// Load config
require_once BASE_DIR . '/config/config.php';

// Load classes
require_once BASE_DIR . '/src/Database.php';
require_once BASE_DIR . '/src/Blog.php';

use App\Blog;

try {
    // Initialize Smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir(SMARTY_TEMPLATE_DIR);
    $smarty->setCompileDir(SMARTY_COMPILE_DIR);
    $smarty->setCacheDir(SMARTY_CACHE_DIR);
    $smarty->force_compile = true;
    $smarty->caching = Smarty::CACHING_OFF;
    
    // Register urlencode plugin (if needed, though escape:'url' is preferred in templates)
    if (!is_callable('urlencode')) { // Check if function exists before registering
         $smarty->registerPlugin('modifier', 'urlencode', 'urlencode');
    }
   
    // Global variables
    $smarty->assign('site_name', SITE_NAME);
    $smarty->assign('base_url', SITE_URL);
    $smarty->assign('keyword', ''); // Default empty keyword
    
    // Initialize Blog
    $blog = new Blog($smarty);
    
    // Routing
    $page = $_GET['page'] ?? 'home';
    
    switch ($page) {
        case 'post':
            $id = (int)($_GET['id'] ?? 0);
            $post = $blog->getPostById($id);
            
            if (!$post) {
                $smarty->assign('page_title', 'Post Not Found');
                $smarty->assign('error_message', 'The post you are looking for does not exist.');
                $smarty->display('404.tpl');
                exit;
            }
            
            $smarty->assign('post', $post);
            $smarty->assign('page_title', $post['title']);
            $smarty->display('post.tpl');
            break;
            
        case 'search':
            $keyword = trim($_GET['q'] ?? '');
            
            if (!empty($keyword)) {
                $results = $blog->searchPosts($keyword);
            } else {
                $results = [];
            }
            
            $smarty->assign('keyword', $keyword);
            $smarty->assign('posts', $results);
            $smarty->assign('page_title', 'Search: ' . $keyword);
            $smarty->display('index.tpl');
            break;
            
        case 'tag':
            $tag = trim($_GET['name'] ?? '');
            
            if (!empty($tag)) {
                $posts = $blog->getPostsByTag($tag);
            } else {
                $posts = [];
            }
            
            $smarty->assign('posts', $posts);
            $smarty->assign('tag_name', $tag);
            $smarty->assign('page_title', 'Tag: ' . $tag);
            $smarty->display('index.tpl');
            break;
            
        case 'home':
        default:
            // Pagination Logic
            $currentPage = (int)($_GET['p'] ?? 1);
            $currentPage = max(1, $currentPage); // Ensure positive page number
            
            $posts_per_page = POSTS_PER_PAGE;
            $total_posts = $blog->getTotalPosts();
            $total_pages = ceil($total_posts / $posts_per_page);
            
            // Ensure current page is within bounds
            if ($currentPage > $total_pages && $total_pages > 0) {
                $currentPage = $total_pages;
            } elseif ($total_pages == 0) {
                $currentPage = 1;
            }
            
            $offset = ($currentPage - 1) * $posts_per_page;
            
            $posts = $blog->getPosts($currentPage, $posts_per_page);
            
            // Assign pagination variables to Smarty
            $smarty->assign('posts', $posts);
            $smarty->assign('current_page', $currentPage);
            $smarty->assign('total_pages', $total_pages);
            $smarty->assign('posts_per_page', $posts_per_page);
            $smarty->assign('total_posts', $total_posts);
            
            $smarty->assign('page_title', 'Home');
            $smarty->display('index.tpl');
            break;
    }
    
} catch (Exception $e) {
    echo '<h1>❌ Error Occurred</h1>';
    echo '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ' : Line ' . $e->getLine() . '</p>';
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        echo '<h2>Stack Trace:</h2>';
        echo '<pre style="background:#f5f5f5; padding:15px; overflow:auto;">';
        echo htmlspecialchars($e->getTraceAsString());
        echo '</pre>';
    }
}
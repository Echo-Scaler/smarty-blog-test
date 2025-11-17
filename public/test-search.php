<?php
define('APP_INIT', true);
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Blog.php';

use App\Blog;

$smarty = new stdClass(); // Dummy smarty for testing
$blog = new Blog($smarty);

echo "<h1>🔍 Search Test</h1>";

// Test searches
$tests = ['Smarty', 'Web', 'PHP', 'Development', 'NotFound'];

foreach ($tests as $keyword) {
    echo "<h2>Search: '$keyword'</h2>";
    
    try {
        $results = $blog->searchPosts($keyword);
        echo "Results: " . count($results) . "<br>";
        
        foreach ($results as $post) {
            echo "- {$post['title']} by {$post['author']}<br>";
        }
        echo "<br>";
        
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage() . "<br><br>";
    }
}
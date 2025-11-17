<?php
namespace App;

use PDO;

class Blog {
    private $smarty;
    private $db;
    
    public function __construct($smarty) {
        $this->smarty = $smarty;
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Get all published posts
     * Compatible with your original array structure
     */
    public function getPosts($page = 1, $limit = 3) {
        $offset = ($page - 1) * $limit;
        
        $sql = "SELECT 
                    p.id,
                    p.title,
                    p.slug,
                    p.excerpt,
                    p.content,
                    p.views,
                    p.created_at,
                    u.full_name as author
                FROM posts p
                INNER JOIN users u ON p.user_id = u.id
                WHERE p.status = 'published'
                ORDER BY p.created_at DESC
                LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        $posts = $stmt->fetchAll();
        
        // Get tags for each post (matching your original structure)
        foreach ($posts as &$post) {
            $post['tags'] = $this->getPostTags($post['id']);
        }
        
        return $posts;
    }
    
    /**
     * Get single post by ID
     * Returns same structure as your original array
     */
    public function getPostById($id) {
        $sql = "SELECT 
                    p.id,
                    p.title,
                    p.slug,
                    p.excerpt,
                    p.content,
                    p.views,
                    p.created_at,
                    u.full_name as author
                FROM posts p
                INNER JOIN users u ON p.user_id = u.id
                WHERE p.id = :id AND p.status = 'published'
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $post = $stmt->fetch();
        
        if ($post) {
            // Get tags (matching your original array structure)
            $post['tags'] = $this->getPostTags($id);
            
            // Increment view count
            $this->incrementViews($id);
        }
        
        return $post;
    }
    
    /**
     * Get tags for a post
     * Returns array of tag names like ['PHP', 'Smarty', 'Tutorial']
     */
    private function getPostTags($postId) {
        $sql = "SELECT t.name
                FROM tags t
                INNER JOIN post_tags pt ON t.id = pt.tag_id
                WHERE pt.post_id = :post_id
                ORDER BY t.name";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':post_id' => $postId]);
        
        $tags = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        return $tags;
    }
    
    /**
     * Increment post view count
     */
    private function incrementViews($postId) {
        $sql = "UPDATE posts SET views = views + 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $postId]);
    }
    
    /**
     * Get total posts count (for pagination)
     */
    public function getTotalPosts() {
        $sql = "SELECT COUNT(*) as total FROM posts WHERE status = 'published'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch()['total'];
    }
    
    /**
     * Search posts
     */
    public function searchPosts($keyword) {
        $sql = "SELECT 
                    p.id,
                    p.title,
                    p.slug,
                    p.excerpt,
                    p.content,
                    p.created_at,
                    u.full_name as author
                FROM posts p
                INNER JOIN users u ON p.user_id = u.id
                WHERE p.status = 'published'
                AND (p.title LIKE :keyword OR p.content LIKE :keyword OR p.excerpt LIKE :keyword)
                ORDER BY p.created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':keyword' => "%$keyword%"]);
        
        $posts = $stmt->fetchAll();
        
        foreach ($posts as &$post) {
            $post['tags'] = $this->getPostTags($post['id']);
        }
        
        return $posts;
    }
    
    /**
     * Get posts by tag
     */
    public function getPostsByTag($tagName) {
        $sql = "SELECT 
                    p.id,
                    p.title,
                    p.slug,
                    p.excerpt,
                    p.content,
                    p.created_at,
                    u.full_name as author
                FROM posts p
                INNER JOIN users u ON p.user_id = u.id
                INNER JOIN post_tags pt ON p.id = pt.post_id
                INNER JOIN tags t ON pt.tag_id = t.id
                WHERE p.status = 'published' AND t.name = :tag
                ORDER BY p.created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':tag' => $tagName]);
        
        $posts = $stmt->fetchAll();
        
        foreach ($posts as &$post) {
            $post['tags'] = $this->getPostTags($post['id']);
        }
        
        return $posts;
    }
}
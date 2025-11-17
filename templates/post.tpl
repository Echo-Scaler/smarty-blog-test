{include file="header.tpl"}

{if isset($post) && $post}
    <article style="background:white; padding:30px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="color:#2c3e50; margin-bottom:15px;">{$post.title}</h2>
        
        <p class="post-meta">
            ✍️ <strong>{$post.author}</strong> | 
            📅 {$post.created_at|date_format:"%d %B %Y"}
            {if isset($post.views) && $post.views > 0}
                | 👁️ {$post.views} views
            {/if}
        </p>
        
        <hr style="margin:20px 0; border:none; border-top:1px solid #eee;">
        
        <div style="line-height:1.8; color:#333;">
            {$post.content|nl2br}
        </div>
        
        {if isset($post.tags) && is_array($post.tags) && count($post.tags) > 0}
            <div style="margin-top:30px; padding-top:20px; border-top:1px solid #eee;">
                <strong>🏷️ Tags:</strong>
                <div class="post-tags" style="display:inline-block; margin-left:10px;">
                    {foreach $post.tags as $tag}
                        <span>
                            <a href="?page=tag&name={$tag|escape:'url'}">{$tag}</a>
                        </span>
                    {/foreach}
                </div>
            </div>
        {/if}
        
        <div style="margin-top:30px;">
            <a href="{$base_url}" style="display:inline-block; padding:10px 20px; background:#95a5a6; color:white; text-decoration:none; border-radius:4px; transition:background 0.3s;">
                ← Back to Home
            </a>
        </div>
    </article>
{else}
    <div style="text-align:center; padding:60px; background:white; border-radius:8px;">
        <h2>😔 Post Not Found</h2>
        <p style="margin:20px 0; color:#666;">The post you are looking for does not exist or has been removed.</p>
        <a href="{$base_url}" style="display:inline-block; padding:10px 20px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">
            ← Back to Home
        </a>
    </div>
{/if}

{include file="footer.tpl"}
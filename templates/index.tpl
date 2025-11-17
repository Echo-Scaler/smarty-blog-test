{include file="header.tpl"}

<h2>📝 Blog Posts</h2>

{if $posts}
    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:20px; margin-top:20px;">
        {foreach $posts as $post}
            <div style="background:white; padding:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                <h3>{$post.title}</h3>
                <p style="color:#666; font-size:0.9em; margin:10px 0;">
                    ✍️ {$post.author} | 📅 {$post.created_at}
                </p>
                <p>{$post.excerpt}</p>
                <a href="?page=post&id={$post.id}" style="display:inline-block; margin-top:10px; padding:8px 16px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">Read More →</a>
            </div>
        {/foreach}
    </div>
{else}
    <p>No posts available.</p>
{/if}

{include file="footer.tpl"}
{include file="header.tpl"}

{if $post}
    <article style="background:white; padding:30px; border-radius:8px;">
        <h2>{$post.title}</h2>
        <p style="color:#666; margin:10px 0;">
            ✍️ {$post.author} | 📅 {$post.created_at}
        </p>
        <hr style="margin:20px 0;">
        <div style="line-height:1.8;">
            {$post.content|nl2br}
        </div>
        
        {if $post.tags}
            <div style="margin-top:20px;">
                <strong>Tags:</strong>
                {foreach $post.tags as $tag}
                    <span style="background:#3498db; color:white; padding:5px 10px; border-radius:4px; margin-right:5px;">{$tag}</span>
                {/foreach}
            </div>
        {/if}
        
        <a href="{$base_url}" style="display:inline-block; margin-top:20px; padding:8px 16px; background:#95a5a6; color:white; text-decoration:none; border-radius:4px;">← Back to Home</a>
    </article>
{else}
    <p>Posts are not found.</p>
{/if}

{include file="footer.tpl"}
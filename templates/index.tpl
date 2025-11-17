{include file="header.tpl"}

{* Display search or tag results heading *}
{if isset($keyword) && $keyword != ''}
    <div style="background:#e3f2fd; padding:15px; border-radius:8px; margin-bottom:20px;">
        <h2>🔍 Search Results for: "{$keyword}"</h2>
        <p>Found {$posts|@count} result(s)</p>
    </div>
{elseif isset($tag_name) && $tag_name != ''}
    <div style="background:#fff3cd; padding:15px; border-radius:8px; margin-bottom:20px;">
        <h2>🏷️ Posts tagged with: "{$tag_name}"</h2>
        <p>Found {$posts|@count} post(s)</p>
    </div>
{else}
    <h2>📝 Blog Posts</h2>
{/if}

{* Display posts or a message if no posts *}
{if isset($posts) && is_array($posts) && count($posts) > 0}
    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:20px; margin-top:20px;">
        {foreach $posts as $post}
            <div style="background:white; padding:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                <h3>{$post.title}</h3>
                <p class="post-meta">
                    ✍️ {$post.author} | 📅 {$post.created_at|date_format:"%d/%m/%Y"}
                    {if isset($post.views) && $post.views > 0}
                        | 👁️ {$post.views} views
                    {/if}
                </p>
                <p>{$post.excerpt}</p>
                
                {* Display tags if available *}
                {if isset($post.tags) && is_array($post.tags) && count($post.tags) > 0}
                    <div class="post-tags">
                        🏷️ 
                        {foreach $post.tags as $tag}
                            <span>
                                <a href="?page=tag&name={$tag|escape:'url'}">{$tag}</a>
                            </span>
                        {/foreach}
                    </div>
                {/if}
                
                <a href="?page=post&id={$post.id}" style="display:inline-block; margin-top:10px; padding:8px 16px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">Read More →</a>
            </div>
        {/foreach}
    </div>
{else}
    {* Message for no results or no posts *}
    <div style="text-align:center; padding:40px; background:white; border-radius:8px; margin-top:20px;">
        {if isset($keyword) && $keyword != ''}
            <p style="font-size:1.2em; color:#666;">😔 No results found for "{$keyword}"</p>
            <p style="margin-top:10px;">Try a different search term.</p>
        {elseif isset($tag_name) && $tag_name != ''}
            <p style="font-size:1.2em; color:#666;">😔 No posts found with tag "{$tag_name}"</p>
        {else}
            <p style="font-size:1.2em; color:#666;">📭 No posts available yet.</p>
        {/if}
        <a href="{$base_url}" style="display:inline-block; margin-top:20px; padding:10px 20px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">
            ← Back to Home
        </a>
    </div>
{/if}

{* Pagination Links *}
{if isset($total_pages) && $total_pages > 1}
    <div style="text-align:center; margin-top:40px;">
        <ul style="list-style:none; padding:0; display:inline-block;">
            {* Previous Page Link *}
            <li style="display:inline-block; margin:0 5px;">
                {if $current_page > 1}
                    <a href="?p={$current_page - 1}" style="padding:8px 12px; background:#ddd; color:#333; text-decoration:none; border-radius:4px;">← Previous</a>
                {else}
                    <span style="padding:8px 12px; background:#eee; color:#aaa; text-decoration:none; border-radius:4px;">← Previous</span>
                {/if}
            </li>
            
            {* Page Number Links *}
            {for $i = 1 to $total_pages}
                <li style="display:inline-block; margin:0 5px;">
                    {if $i == $current_page}
                        <span style="padding:8px 12px; background:#3498db; color:white; text-decoration:none; border-radius:4px; font-weight:bold;">{$i}</span>
                    {else}
                        <a href="?p={$i}" style="padding:8px 12px; background:#ddd; color:#333; text-decoration:none; border-radius:4px;">{$i}</a>
                    {/if}
                </li>
            {/for}
            
            {* Next Page Link *}
            <li style="display:inline-block; margin:0 5px;">
                {if $current_page < $total_pages}
                    <a href="?p={$current_page + 1}" style="padding:8px 12px; background:#ddd; color:#333; text-decoration:none; border-radius:4px;">Next →</a>
                {else}
                    <span style="padding:8px 12px; background:#eee; color:#aaa; text-decoration:none; border-radius:4px;">Next →</span>
                {/if}
            </li>
        </ul>
    </div>
{/if}

{include file="footer.tpl"}
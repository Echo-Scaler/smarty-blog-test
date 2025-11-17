{include file="header.tpl"}

<div style="text-align:center; padding:80px 20px; background:white; border-radius:8px;">
    <div style="font-size:80px; margin-bottom:20px;">😔</div>
    <h1 style="color:#e74c3c; margin-bottom:10px;">404 - Page Not Found</h1>
    
    {if isset($error_message)}
        <p style="font-size:1.1em; color:#666; margin:20px 0;">{$error_message}</p>
    {else}
        <p style="font-size:1.1em; color:#666; margin:20px 0;">
            The page you are looking for does not exist.
        </p>
    {/if}
    
    <div style="margin-top:30px;">
        <a href="{$base_url}" style="display:inline-block; padding:12px 24px; background:#3498db; color:white; text-decoration:none; border-radius:4px; font-size:1.1em;">
            🏠 Go to Homepage
        </a>
    </div>
</div>

{include file="footer.tpl"}
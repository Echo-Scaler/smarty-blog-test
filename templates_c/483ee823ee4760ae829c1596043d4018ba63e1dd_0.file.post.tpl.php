<?php
/* Smarty version 4.5.6, created on 2025-11-17 13:20:18
  from 'C:\xampp\htdocs\my-blog\templates\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_691ac5aacc45c2_75968103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '483ee823ee4760ae829c1596043d4018ba63e1dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\my-blog\\templates\\post.tpl',
      1 => 1763361896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_691ac5aacc45c2_75968103 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\my-blog\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['post']->value)) && $_smarty_tpl->tpl_vars['post']->value) {?>
    <article style="background:white; padding:30px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="color:#2c3e50; margin-bottom:15px;"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
        
        <p class="post-meta">
            ✍️ <strong><?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
</strong> | 
            📅 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%d %B %Y");?>

            <?php if ((isset($_smarty_tpl->tpl_vars['post']->value['views'])) && $_smarty_tpl->tpl_vars['post']->value['views'] > 0) {?>
                | 👁️ <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
 views
            <?php }?>
        </p>
        
        <hr style="margin:20px 0; border:none; border-top:1px solid #eee;">
        
        <div style="line-height:1.8; color:#333;">
            <?php echo nl2br((string) $_smarty_tpl->tpl_vars['post']->value['content'], (bool) 1);?>

        </div>
        
        <?php if ((isset($_smarty_tpl->tpl_vars['post']->value['tags'])) && is_array($_smarty_tpl->tpl_vars['post']->value['tags']) && count($_smarty_tpl->tpl_vars['post']->value['tags']) > 0) {?>
            <div style="margin-top:30px; padding-top:20px; border-top:1px solid #eee;">
                <strong>🏷️ Tags:</strong>
                <div class="post-tags" style="display:inline-block; margin-left:10px;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['tags'], 'tag');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
                        <span>
                            <a href="?page=tag&name=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['tag']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</a>
                        </span>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        <?php }?>
        
        <div style="margin-top:30px;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" style="display:inline-block; padding:10px 20px; background:#95a5a6; color:white; text-decoration:none; border-radius:4px; transition:background 0.3s;">
                ← Back to Home
            </a>
        </div>
    </article>
<?php } else { ?>
    <div style="text-align:center; padding:60px; background:white; border-radius:8px;">
        <h2>😔 Post Not Found</h2>
        <p style="margin:20px 0; color:#666;">The post you are looking for does not exist or has been removed.</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" style="display:inline-block; padding:10px 20px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">
            ← Back to Home
        </a>
    </div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

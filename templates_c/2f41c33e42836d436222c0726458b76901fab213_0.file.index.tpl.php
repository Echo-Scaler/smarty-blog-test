<?php
/* Smarty version 4.5.6, created on 2025-11-17 12:27:14
  from 'C:\xampp\htdocs\my-blog\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_691ab93a199b67_76749243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f41c33e42836d436222c0726458b76901fab213' => 
    array (
      0 => 'C:\\xampp\\htdocs\\my-blog\\templates\\index.tpl',
      1 => 1763358625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_691ab93a199b67_76749243 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2>📝 Blog Posts</h2>

<?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:20px; margin-top:20px;">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
            <div style="background:white; padding:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                <h3><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h3>
                <p style="color:#666; font-size:0.9em; margin:10px 0;">
                    ✍️ <?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
 | 📅 <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>

                </p>
                <p><?php echo $_smarty_tpl->tpl_vars['post']->value['excerpt'];?>
</p>
                <a href="?page=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" style="display:inline-block; margin-top:10px; padding:8px 16px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">Read More →</a>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php } else { ?>
    <p>No posts available.</p>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

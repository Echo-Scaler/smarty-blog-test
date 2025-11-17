<?php
/* Smarty version 4.5.6, created on 2025-11-17 12:27:15
  from 'C:\xampp\htdocs\my-blog\templates\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_691ab93bb402a4_45541009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '483ee823ee4760ae829c1596043d4018ba63e1dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\my-blog\\templates\\post.tpl',
      1 => 1763358517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_691ab93bb402a4_45541009 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['post']->value) {?>
    <article style="background:white; padding:30px; border-radius:8px;">
        <h2><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
        <p style="color:#666; margin:10px 0;">
            ✍️ <?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
 | 📅 <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>

        </p>
        <hr style="margin:20px 0;">
        <div style="line-height:1.8;">
            <?php echo nl2br((string) $_smarty_tpl->tpl_vars['post']->value['content'], (bool) 1);?>

        </div>
        
        <?php if ($_smarty_tpl->tpl_vars['post']->value['tags']) {?>
            <div style="margin-top:20px;">
                <strong>Tags:</strong>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['tags'], 'tag');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
                    <span style="background:#3498db; color:white; padding:5px 10px; border-radius:4px; margin-right:5px;"><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</span>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>
        
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" style="display:inline-block; margin-top:20px; padding:8px 16px; background:#95a5a6; color:white; text-decoration:none; border-radius:4px;">← Back to Home</a>
    </article>
<?php } else { ?>
    <p>Posts are not found.</p>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

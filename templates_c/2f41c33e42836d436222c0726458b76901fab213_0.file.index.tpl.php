<?php
/* Smarty version 4.5.6, created on 2025-11-17 13:20:10
  from 'C:\xampp\htdocs\my-blog\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_691ac5a2d9d677_98609172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f41c33e42836d436222c0726458b76901fab213' => 
    array (
      0 => 'C:\\xampp\\htdocs\\my-blog\\templates\\index.tpl',
      1 => 1763362154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_691ac5a2d9d677_98609172 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\my-blog\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\my-blog\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['keyword']->value)) && $_smarty_tpl->tpl_vars['keyword']->value != '') {?>
    <div style="background:#e3f2fd; padding:15px; border-radius:8px; margin-bottom:20px;">
        <h2>🔍 Search Results for: "<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
"</h2>
        <p>Found <?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['posts']->value);?>
 result(s)</p>
    </div>
<?php } elseif ((isset($_smarty_tpl->tpl_vars['tag_name']->value)) && $_smarty_tpl->tpl_vars['tag_name']->value != '') {?>
    <div style="background:#fff3cd; padding:15px; border-radius:8px; margin-bottom:20px;">
        <h2>🏷️ Posts tagged with: "<?php echo $_smarty_tpl->tpl_vars['tag_name']->value;?>
"</h2>
        <p>Found <?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['posts']->value);?>
 post(s)</p>
    </div>
<?php } else { ?>
    <h2>📝 Blog Posts</h2>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['posts']->value)) && is_array($_smarty_tpl->tpl_vars['posts']->value) && count($_smarty_tpl->tpl_vars['posts']->value) > 0) {?>
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
                <p class="post-meta">
                    ✍️ <?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
 | 📅 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%d/%m/%Y");?>

                    <?php if ((isset($_smarty_tpl->tpl_vars['post']->value['views'])) && $_smarty_tpl->tpl_vars['post']->value['views'] > 0) {?>
                        | 👁️ <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
 views
                    <?php }?>
                </p>
                <p><?php echo $_smarty_tpl->tpl_vars['post']->value['excerpt'];?>
</p>
                
                                <?php if ((isset($_smarty_tpl->tpl_vars['post']->value['tags'])) && is_array($_smarty_tpl->tpl_vars['post']->value['tags']) && count($_smarty_tpl->tpl_vars['post']->value['tags']) > 0) {?>
                    <div class="post-tags">
                        🏷️ 
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
                <?php }?>
                
                <a href="?page=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" style="display:inline-block; margin-top:10px; padding:8px 16px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">Read More →</a>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php } else { ?>
        <div style="text-align:center; padding:40px; background:white; border-radius:8px; margin-top:20px;">
        <?php if ((isset($_smarty_tpl->tpl_vars['keyword']->value)) && $_smarty_tpl->tpl_vars['keyword']->value != '') {?>
            <p style="font-size:1.2em; color:#666;">😔 No results found for "<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
"</p>
            <p style="margin-top:10px;">Try a different search term.</p>
        <?php } elseif ((isset($_smarty_tpl->tpl_vars['tag_name']->value)) && $_smarty_tpl->tpl_vars['tag_name']->value != '') {?>
            <p style="font-size:1.2em; color:#666;">😔 No posts found with tag "<?php echo $_smarty_tpl->tpl_vars['tag_name']->value;?>
"</p>
        <?php } else { ?>
            <p style="font-size:1.2em; color:#666;">📭 No posts available yet.</p>
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" style="display:inline-block; margin-top:20px; padding:10px 20px; background:#3498db; color:white; text-decoration:none; border-radius:4px;">
            ← Back to Home
        </a>
    </div>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['total_pages']->value)) && $_smarty_tpl->tpl_vars['total_pages']->value > 1) {?>
    <div style="text-align:center; margin-top:40px;">
        <ul style="list-style:none; padding:0; display:inline-block;">
                        <li style="display:inline-block; margin:0 5px;">
                <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
                    <a href="?p=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
" style="padding:8px 12px; background:#ddd; color:#333; text-decoration:none; border-radius:4px;">← Previous</a>
                <?php } else { ?>
                    <span style="padding:8px 12px; background:#eee; color:#aaa; text-decoration:none; border-radius:4px;">← Previous</span>
                <?php }?>
            </li>
            
                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <li style="display:inline-block; margin:0 5px;">
                    <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>
                        <span style="padding:8px 12px; background:#3498db; color:white; text-decoration:none; border-radius:4px; font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</span>
                    <?php } else { ?>
                        <a href="?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="padding:8px 12px; background:#ddd; color:#333; text-decoration:none; border-radius:4px;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                    <?php }?>
                </li>
            <?php }
}
?>
            
                        <li style="display:inline-block; margin:0 5px;">
                <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
                    <a href="?p=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
" style="padding:8px 12px; background:#ddd; color:#333; text-decoration:none; border-radius:4px;">Next →</a>
                <?php } else { ?>
                    <span style="padding:8px 12px; background:#eee; color:#aaa; text-decoration:none; border-radius:4px;">Next →</span>
                <?php }?>
            </li>
        </ul>
    </div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

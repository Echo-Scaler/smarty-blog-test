<?php
/* Smarty version 4.5.6, created on 2025-11-17 12:27:15
  from 'C:\xampp\htdocs\my-blog\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_691ab93bd4cec1_58940431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a7a68ed7e8008b48a0139496038c87705e42383' => 
    array (
      0 => 'C:\\xampp\\htdocs\\my-blog\\templates\\header.tpl',
      1 => 1763357628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_691ab93bd4cec1_58940431 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? 'Home' ?? null : $tmp);?>
 - <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        header { background: #527ba5ff; color: white; padding: 20px; }
        header h1 { display: inline-block; }
        nav { float: right; margin-top: 5px; }
        nav a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1200px; margin: 20px auto; padding: 0 20px; }
    </style>
</head>
<body>
    <header>
        <h1>🌟 <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
</h1>
        <nav>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">🏠 Home</a>
        </nav>
    </header>
    <main class="container"><?php }
}

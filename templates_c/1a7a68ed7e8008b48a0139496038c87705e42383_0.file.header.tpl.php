<?php
/* Smarty version 4.5.6, created on 2025-11-17 13:20:19
  from 'C:\xampp\htdocs\my-blog\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_691ac5ab05b653_86744001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a7a68ed7e8008b48a0139496038c87705e42383' => 
    array (
      0 => 'C:\\xampp\\htdocs\\my-blog\\templates\\header.tpl',
      1 => 1763361888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_691ac5ab05b653_86744001 (Smarty_Internal_Template $_smarty_tpl) {
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
        body { font-family: Arial, sans-serif; background: #f5f5f5; line-height: 1.6; }
        header { background: #2c3e50; color: white; padding: 20px; }
        header h1 { display: inline-block; margin: 0; }
        nav { float: right; margin-top: 5px; }
        nav a { color: white; text-decoration: none; margin-left: 20px; transition: opacity 0.3s; }
        nav a:hover { opacity: 0.8; }
        .search-form { float: right; margin-left: 20px; margin-top: 3px; }
        .search-form input[type="text"] { 
            padding: 6px 12px; 
            border-radius: 4px; 
            border: none; 
            width: 200px;
        }
        .search-form button { 
            padding: 6px 15px; 
            background: #3498db; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            transition: background 0.3s;
        }
        .search-form button:hover {
            background: #2980b9;
        }
        .container { 
            max-width: 1200px; 
            margin: 20px auto; 
            padding: 0 20px; 
            min-height: 60vh;
        }
        .post-meta { 
            color: #666; 
            font-size: 0.9em; 
            margin: 10px 0; 
        }
        .post-tags { 
            margin-top: 15px; 
        }
        .post-tags span { 
            display: inline-block; 
            background: #3498db; 
            color: white; 
            padding: 4px 10px; 
            border-radius: 4px; 
            margin-right: 5px; 
            margin-bottom: 5px;
            font-size: 0.85em; 
        }
        .post-tags a { 
            color: white; 
            text-decoration: none; 
        }
        .post-tags a:hover {
            text-decoration: underline;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <header class="clearfix">
        <h1>🌟 <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
</h1>
        <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" class="search-form">
            <input type="hidden" name="page" value="search">
            <input 
                type="text" 
                name="q" 
                placeholder="Search posts..." 
                value="<?php if ((isset($_smarty_tpl->tpl_vars['keyword']->value))) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);
}?>"
                minlength="2"
                required
            >
            <button type="submit">🔍 Search</button>
        </form>
        <nav>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">🏠 Home</a>
        </nav>
    </header>
    <main class="container"><?php }
}

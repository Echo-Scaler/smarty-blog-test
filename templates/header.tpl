<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$page_title|default:'Home'} - {$site_name}</title>
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
        <h1>🌟 {$site_name}</h1>
        <form method="get" action="{$base_url}" class="search-form">
            <input type="hidden" name="page" value="search">
            <input 
                type="text" 
                name="q" 
                placeholder="Search posts..." 
                value="{if isset($keyword)}{$keyword|escape:'html'}{/if}"
                minlength="2"
                required
            >
            <button type="submit">🔍 Search</button>
        </form>
        <nav>
            <a href="{$base_url}">🏠 Home</a>
        </nav>
    </header>
    <main class="container">
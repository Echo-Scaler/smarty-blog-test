<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$page_title|default:'Home'} - {$site_name}</title>
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
        <h1>🌟 {$site_name}</h1>
        <nav>
            <a href="{$base_url}">🏠 Home</a>
        </nav>
    </header>
    <main class="container">
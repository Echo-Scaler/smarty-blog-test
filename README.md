
# My Blog Project

## Overview
This is a simple blog application built with PHP, using the Smarty templating engine for rendering views. It includes basic features like displaying posts, a database connection, and templated pages. The project is set up to run on a local XAMPP server.

## Project Structure
- **config/**: Contains configuration files.
  - `config.php`: Main configuration file for database and other settings.
- **public/**: Publicly accessible files.
  - `css/style.css`: Stylesheet for the blog.
  - `index.php`: Main entry point for the blog.
  - `test-search.php`: A test file for search functionality.
- **src/**: Source code for core logic.
  - `Blog.php`: Handles blog-related operations.
  - `Database.php`: Manages database connections.
- **templates/**: Smarty template files.
  - `404.tpl`: 404 error page template.
  - `footer.tpl`: Footer template.
  - `header.tpl`: Header template.
  - `index.tpl`: Main index template.
  - `post.tpl`: Single post template.
- **templates_c/**: Compiled Smarty templates (auto-generated).
- **vendor/**: Composer dependencies, including Smarty.

## Requirements
- PHP 7.4 or higher
- MySQL database
- Composer for dependency management
- XAMPP or similar local server environment

## Installation
1. Clone or download the project to `c:\xampp\htdocs\my-blog`.
2. Install dependencies:
3. Configure the database in `config/config.php` (update host, username, password, etc.).
4. Start XAMPP Apache and MySQL servers.
5. Access the blog at `http://localhost/my-blog/public/index.php`.

## Usage
- Visit the homepage to see blog posts.
- Create and manage posts via the admin interface (if implemented) or directly in the database.
- Customize templates in the `templates/` directory.

## Dependencies
- Smarty: Templating engine.
- Managed via Composer (see `composer.json`).

## License
This project is open-source and available under the MIT License.
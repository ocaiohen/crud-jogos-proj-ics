<?php
// Database configuration for Debian/MySQL-MariaDB
// Override via environment variables in Apache VirtualHost if needed.

define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_USER', getenv('DB_USER') ?: 'user_peopledb');
define('DB_PASS', getenv('DB_PASS') ?: 'ifrn');
define('DB_NAME', getenv('DB_NAME') ?: 'peopledb');

// URL used for redirecting back to the frontend site
// Ensure this matches the Apache VirtualHost for the public site.
define('FRONTEND_BASE_URL', getenv('FRONTEND_BASE_URL') ?: 'https://mygames.com.br');

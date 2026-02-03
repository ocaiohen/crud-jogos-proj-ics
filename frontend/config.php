<?php
// Base URLs for Debian/Apache virtual hosts
// Adjust if your virtual host names differ.
if (!defined('FRONTEND_BASE_URL')) {
	define('FRONTEND_BASE_URL', 'http://mygames.com.br');
}
define('BACKEND_BASE_URL', 'http://mygames.backend.biz');

// Convenience aliases for templates
$frontendBaseUrl = FRONTEND_BASE_URL;
$backendBaseUrl = BACKEND_BASE_URL;
?>

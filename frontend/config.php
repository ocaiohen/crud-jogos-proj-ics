<?php
// URLs base para os VirtualHosts (Debian/Apache)
// Ajuste caso seus hosts virtuais tenham nomes diferentes.
if (!defined('FRONTEND_BASE_URL')) {
	define('FRONTEND_BASE_URL', 'http://mygames.com.br');
}
// Defina BACKEND_BASE_URL apenas se ainda não estiver definida
if (!defined('BACKEND_BASE_URL')) {
	define('BACKEND_BASE_URL', 'http://mygames.backend.biz');
}

// Aliases de conveniência para templates
$frontendBaseUrl = FRONTEND_BASE_URL;
$backendBaseUrl = BACKEND_BASE_URL;
?>

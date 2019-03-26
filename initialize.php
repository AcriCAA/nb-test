<?php 
	
define ("APP_ROOT", dirname(__FILE__));

$config = require(APP_ROOT .  "/config.php");
	
$token = $config['token'];

$baseApiUrl = $config['base_url']; 
$site_slug = $config['slug']; 


?>
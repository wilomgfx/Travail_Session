<?php

session_start();

// Clear session data from memory
$_SESSION = array();

// Clean up session ID
session_destroy();

// Delete the cookie for the session
$name = session_name(); // Getname of the session cookie
$expire = strtotime('-1 year');
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($name, '', $expire, $path, $domain, $secure, $httponly);

header("Location: index.php");

?>
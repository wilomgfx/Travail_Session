<?php
$dsn = 'mysql:host=localhost;dbname=julieprobd';
$username = 'super_admin';
$password = 'juliepro1234';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>
<?php
require('../model/database.php');
require('../model/login.php');

if (session_status() == PHP_SESSION_NONE)
    session_start();

if(isset($_POST['action']))
{
    $action = $_POST['action'];
}
else
{
    $action = 'show_login_form';
}

switch($action)
{
    case 'login' :
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = authentify($username, $password);
        if (is_null($user))
        {
            $failed = 'true';
            include('login_page.php');
        }
        else
        {
            $lifetime = 0;
            session_set_cookie_params($lifetime, '/');
            if (session_status() == PHP_SESSION_NONE)
                session_start();
            $_SESSION['user'] = array();
            $_SESSION['user'] = array('username' => $user['username'], 'password' => $user['password'], 'statut' => $user['statut']);

        if ($user['statut'] == null)
        {
         $failed2 = 'true';
         include('login_page.php');
        }
        else
            include('successful.php');
        }
        break;
    case 'show_login_form' :
        include('login_page.php');
        break;
}

?>
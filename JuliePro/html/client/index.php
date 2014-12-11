<?php
require('../model/database.php');
require('../model/client_db.php');
require('../model/utilisateur_db.php');
require('../model/entraineur_db.php');



if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'profil';
}

switch($action)
{
    case 'profil' :
        include('client_profil.php');
            break;
    case 'rapport' :
        include('client_rapport.php');
             break;
}
?>
<?php
require('../model/database.php');
require('../model/entraineur_db.php');
require('../model/utilisateur_db.php');

if (isset($_POST['action'])) {
$action = $_POST['action'];
} else if (isset($_GET['action'])) {
$action = $_GET['action'];
} else {
$action = 'entraineur_profil';
}


if($action == 'entraineur_profil')
{
    include('entraineur_profil.php');
}

?>
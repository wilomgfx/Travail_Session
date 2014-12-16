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
        $userID = get_userID_by_username($_SESSION['user']['username']);
        $client = get_client_by_userID($userID);
        $entraineur = get_entraineur_by_ID($client['FK_entraineurID']);
        $rapports = get_rapports_quotidiens_by_clientID($client['clientID']);
        include('client_rapport.php');
             break;
}
?>
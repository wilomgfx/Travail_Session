<?php
require('../model/database.php');
require('../model/client_db.php');
require('../model/utilisateur_db.php');
require('../model/entraineur_db.php');
require('../model/objectif_db.php');
require('../model/rapportquotidien_db.php');
require('../model/rendezvous_db.php');

if (session_status() == PHP_SESSION_NONE)
    session_start();

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
    case 'ajouter_rapport':
        $entrainementAjout = $_POST['entrainementAjout'];
        $nbrCaloriesEntrainementAjout = $_POST['nbrCaloriesEntrainementAjout'];
        $maxBattementParMinuteAjout = $_POST['maxBattementParMinuteAjout'];
        $nbrCaloriesIngereAjout = $_POST['nbrCaloriesIngereAjout'];
        $dateAjout = $_POST['dateAjout'];
        $vo2MaxAjout = $_POST['vo2MaxAjout'];
        $poidsAjout = $_POST['poidsAjout'];
        $clientID = $_POST['clientIDAjout'];
        add_rapport_quotidien($entrainementAjout, $nbrCaloriesEntrainementAjout, $maxBattementParMinuteAjout, $nbrCaloriesIngereAjout, $dateAjout, $vo2MaxAjout, $poidsAjout, $clientID);
        include('client_rapport.php');
        break;
}
?>
<?php
require('../model/database.php');
require('../model/entraineur_db.php');
require('../model/utilisateur_db.php');
require('../model/client_db.php');
require('../model/objectif_db.php');
require('../model/rapportquotidien_db.php');
require('../model/rendezvous_db.php');
require('../model/message_db.php');


if (session_status() == PHP_SESSION_NONE)
    session_start();

if (isset($_POST['action'])) {
$action = $_POST['action'];
} else if (isset($_GET['action'])) {
$action = $_GET['action'];
} else {
$action = 'entraineur_profil';
}


$userid = get_userID_by_username($_SESSION['user']['username']);
$Entraineur = get_entraineur_by_userID($userid);
//$clients = get_client();
$clients = get_client_by_entraineur($Entraineur['entraineurID']);

if($action == 'entraineur_profil')
{
    include('entraineur_profil.php');
}
if ($action == 'client_add') {
    // Get the current category ID
    // Display the product list
    include('entraineur_gestion.php');
}
if($action == 'Afficher'){
    $ClientID = $_POST['clientID'];
    $client = get_client_by_ID($ClientID);
    include('entraineur_gestion.php');

}
if($action == 'Modifier')
{

    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $numTel = $_POST['Tel'];
    $numCell = $_POST['Cell'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodePostal = $_POST['CodePostal'];
    $Age = $_POST['Age'];
    $Courriel = $_POST['Courriel'];
    $ClientID = $_POST['clientID'];
    if (empty($Nom) || empty($Prenom) || empty($numTel) || empty($numCell) || empty($Adresse) || empty($Ville) || empty($CodePostal) ||
        empty($Age) || empty($Courriel)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    }else{
    modifier_client($Nom,$Prenom, $numTel,$numCell,$Adresse,$Ville,$CodePostal,$Age,$Courriel,$ClientID);
    //Pour montrer que le client est bien modifié
    echo "<script type='text/javascript'>alert('Client : '+ '$Nom' + ' modifié avec succès!')</script>";

    include('entraineur_gestion.php');
    }
}
if($action == 'Inscrire')
{
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $numTel = $_POST['Tel'];
    $numCell = $_POST['Cell'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodePostal = $_POST['CodePostal'];
    $Age = $_POST['Age'];
    $DateInsc = $_POST['DateInsc'];
    $Courriel = $_POST['Courriel'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $statut = $_POST['Statut'];
    $Entraineur = $_POST['Entraineur'];
    ajouter_utilisateur($username,$password,$statut);
    $UtilisateurID = get_userID_by_username($username);
    $EntraineurID = get_entraineurID_by_name($Entraineur);

    if (empty($Nom) || empty($Prenom) || empty($numTel) || empty($numTel) || empty($numCell) || empty($Adresse) || empty($Ville) || empty($CodePostal) ||
        empty($Age) || empty($DateInsc) || empty($Courriel) || empty($username) || empty($password) || empty($statut) || empty($Entraineur)) {
    $error = "Invalid product data. Check all fields and try again.";
    include('../errors/error.php');
    }else
    {
    inscrire_client($Nom,$Prenom,$numTel,$numCell,$Adresse,$Ville,$CodePostal,$Age,$DateInsc,$Courriel,$UtilisateurID,$EntraineurID);
    //Pour montrer que le client est bien ajouté
    echo "<script type='text/javascript'>alert('Client : '+ '$Nom' + ' ajouté avec succès!')</script>";
    include('entraineur_gestion.php');
    }
}
if($action == 'mesClients' )
{
    include('entraineur_gestion.php');
}
if($action == 'obtenirRapport' )
{
    $clientAAfficherID = $_POST['clientIDEnvoyer'];
    $clientObtenu = get_client_by_ID($clientAAfficherID);
    include('entraineur_rapport.php');
}
if($action == 'NouveauxRendezVous')
{
    if(empty($_POST['Date']))return;
    $date = $_POST['Date'];
    $entraineurIDRendezVous = $_POST['entraineurIDRendezVous'];
    $clientIDRendezVous = $_POST['clientIDRendezVous'];
    $clientObtenu = get_client_by_ID($clientIDRendezVous);

    add_rendezVous($date,$entraineurIDRendezVous,$clientIDRendezVous);

    include('entraineur_rapport.php');
}
if($action == 'NouveauxObjectifs')
{
    $nbrEntrainement = $_POST['NombreEntrainement'];
    $nbrCalorieDepensee = $_POST['CalorieDepensées'];
    $maxBattementObj = $_POST['ObjectifBatement'];
    $nbrCalorieIngere = $_POST['CalorieIngérées'];
    $date = $_POST['Date'];
    $clientIDRendezVous = $_POST['clientIDRendezVous'];

    $clientObtenu = get_client_by_ID($clientIDRendezVous);

    add_objectif($nbrEntrainement,$nbrCalorieDepensee,$maxBattementObj,$nbrCalorieIngere,$date,$clientIDRendezVous);
    include('entraineur_rapport.php');
}
if($action == 'ajouterMessage')
{
    $message = $_POST['message'];
    $nomEntraineur = $_POST['nomEntraineur'];
    $FK_clientID = $_POST['clientID'];
    $clientObtenu = get_client_by_ID($FK_clientID);

    add_message($message, $nomEntraineur, $FK_clientID);

    include('entraineur_rapport.php');
}
?>


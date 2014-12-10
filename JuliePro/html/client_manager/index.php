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
    $action = 'client_add';
}

$clients = get_client();

if ($action == 'client_add') {
    // Get the current category ID
    // Display the product list
    include('client_add.php');
}
if($action == 'Afficher'){
    $ClientID = $_POST['clientID'];
    $client = get_client_by_ID($ClientID);
    include('client_add.php');

}
if($action == 'Modifier')
{

    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $NoTel = $_POST['Tel'];
    $NoCell = $_POST['Cell'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodePostal = $_POST['CodePostal'];
    $Age = $_POST['Age'];
    $Courriel = $_POST['Courriel'];
    $Client = get_client_by_name($Nom);
    $ClientID = $Client['clientID'];

     modifier_client($ClientID,$Nom,$Prenom, $NoTel,$NoCell,$Adresse,$Ville,$CodePostal,$Age,$Courriel);

    include('client_add.php');
}
if($action == 'Inscrire')
{
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $NoTel = $_POST['Tel'];
    $NoCell = $_POST['Cell'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodePostal = $_POST['CodePostal'];
    $Age = $_POST['Age'];
    $DateInsc = $_POST['DateInsc'];
    $Courriel = $_POST['Courriel'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $statut = $_POST['LstStatut'];
    $Entraineur = $_POST['Entraineur'];
    ajouter_utilisateur($username,$password,$statut);
    $UtilisateurID = get_userID_by_username($username);
    $EntraineurID = get_entraineurID_by_name($Entraineur);

    inscrire_client($Nom,$Prenom,$NoTel,$NoCell,$Adresse,$Ville,$CodePostal,$Age,$DateInsc,$Courriel,$UtilisateurID,$EntraineurID);

    include('client_add.php');
}
?>
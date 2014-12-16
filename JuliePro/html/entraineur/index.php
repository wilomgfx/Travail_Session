<?php
require('../model/database.php');
require('../model/entraineur_db.php');
require('../model/utilisateur_db.php');
require('../model/client_db.php');
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
$client = get_client_by_entraineur($Entraineur['entraineurID']);

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
    $NoTel = $_POST['Tel'];
    $NoCell = $_POST['Cell'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodePostal = $_POST['CodePostal'];
    $Age = $_POST['Age'];
    $Courriel = $_POST['Courriel'];
    $ClientID = $_POST['clientID'];

    modifier_client($Nom,$Prenom, $NoTel,$NoCell,$Adresse,$Ville,$CodePostal,$Age,$Courriel,$ClientID);
    //Pour montrer que le client est bien modifié
    echo "<script type='text/javascript'>alert('Client : '+ '$Nom' + ' modifié avec succès!')</script>";

    include('entraineur_gestion.php');
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
    //Pour montrer que le client est bien ajouté
    echo "<script type='text/javascript'>alert('Client : '+ '$Nom' + ' ajouté avec succès!')</script>";
    include('entraineur_gestion.php');
}
if($action == 'mesClients' )
{
    include('entraineur_gestion.php');
}
?>

?>
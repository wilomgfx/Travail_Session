<?php
require('../model/database.php');
require('../model/client_db.php');
require('../model/utilisateur_db.php');
require('../model/entraineur_db.php');

if (session_status() == PHP_SESSION_NONE)
    session_start();

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
    $ClientID = $_POST['clientID'];

     modifier_client($Nom,$Prenom, $NoTel,$NoCell,$Adresse,$Ville,$CodePostal,$Age,$Courriel,$ClientID);
    //Pour montrer que le client est bien modifié
    echo "<script type='text/javascript'>alert('Client : '+ '$Nom' + ' modifié avec succès!')</script>";

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
    $statut = $_POST['Statut'];
    $Entraineur = $_POST['Entraineur'];
   // ajouter_utilisateur($username,$password,$statut);
    //$UtilisateurID = get_userID_by_username($username);
    //$EntraineurID = get_entraineurID_by_name($Entraineur);
// Validate the inputs
    if (empty($Nom) || empty($Prenom) || empty($NoTel) || empty($NoCell)|| empty($Adresse) || empty($Ville) || empty($CodePostal) ||
        empty($Age) || empty($DateInsc) || empty($Courriel) || empty($username) || empty($password) || empty($statut) || empty($Entraineur)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    }
    elseif(userNameExists($username))
    {
        $error="Le nom d'utilisateur est déjà utilisé, veuillez en utiliser un autre";
        include('../errors/error.php');
    }
    else {
      $UtilisateurID = ajouter_utilisateur($username,$password,$statut);
      $EntraineurID = get_entraineurID_by_name($Entraineur);
    inscrire_client($Nom,$Prenom,$NoTel,$NoCell,$Adresse,$Ville,$CodePostal,$Age,$DateInsc,$Courriel,$UtilisateurID,$EntraineurID);
    //Pour montrer que le client est bien ajouté
    echo "<script type='text/javascript'>alert('Client : '+ '$Nom' + ' ajouté avec succès!')</script>";
   //include('client_add.php');
        header('Location: index.php?action=client_add');
    }
}
if($action =="Supprimer")
{
    $IDclient = $_POST['clientID'];
    $client =  get_client_by_ID($IDclient);
    $fk_useridClient = $client['FK_utilisateurID'];
    supprimer_utilisateur_by_userid($fk_useridClient);
    supprimer_client($IDclient);
    echo "<script type='text/javascript'>alert('Client suprimé avec succès!')</script>";
    header('Location: index.php?action=client_add');
    //include('client_add.php');
}

?>
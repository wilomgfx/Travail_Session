<?php
require('../model/database.php');
require('../model/client_db.php');
require('../model/utilisateur_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'client_add';
}

if ($action == 'client_add') {
    // Get the current category ID
    // Display the product list
    include('client_add.php');
}
if($action == 'Afficher'){


}
if($action == 'Modifier')
{

}
if($action == 'Inscrire')
{
    $Nom = $_POST['Nom'];
    $Prenom = $_POST[Nom
    $NoTel = $_POST[
    $NoCell = $_POST[
    $Adresse = $_POST[
    $Ville = $_POST[
    $CodePostal = $_POST[
    $Age = $_POST[
    $DateInsc = $_POST[
    $Courriel = $_POST[
    $UtilisateurID = $_POST[
    $EntraineurID = $_POST[
}
?>
<?php
require('../model/database.php');
require('../model/entraineur_db.php');
require('../model/utilisateur_db.php');

if (session_status() == PHP_SESSION_NONE)
    session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'entraineur_add';
}
$entraineurs = get_entraineurs();

if ($action == 'entraineur_add') {

    include('entraineur_add.php');
}

if($action == 'Afficher'){
    $entraineurID = $_POST['entraineurID'];
    $entraineur = get_entraineur_by_ID($entraineurID);
    include('entraineur_add.php');

}
if($action == 'Modifier'){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numTel = $_POST['tel'];
    $numCell = $_POST['cell'];
    $Adresse = $_POST['Adresse'];
    $ville = $_POST['Ville'];
    $codePostal = $_POST['CodePostal'];
    $age = $_POST['Age'];
    $courriel = $_POST['Courriel'];
    $idEntraineur = $_POST['entraineurID'];

    // Validate the inputs
    if (empty($nom) || empty($prenom) || empty($numTel) || empty($numTel) || empty($numCell) || empty($Adresse) || empty($ville) || empty($codePostal) ||
        empty($age) || empty($courriel)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    }else{
        update_entraineur($nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$courriel,$idEntraineur);
        echo "<script type='text/javascript'>alert('Entraineur : '+ '$nom' + ' modifié avec succès!')</script>";
        include('../index/indexbase.php');
    }


}

if($action =='add_entraineur')
{
    $user = $_POST['User'];
    $password = $_POST['Password'];
    $statut = $_POST['Statut'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $numTel = $_POST['Tel'];
    $numCell = $_POST['Cell'];
    $Adresse = $_POST['Adresse'];
    $ville = $_POST['Ville'];
    $codePostal = $_POST['CodePostal'];
    $age = $_POST['Age'];
    $dateInscription = $_POST['DateInsc'];
    $courriel = $_POST['Courriel'];

    // Validate the inputs
    if (empty($nom) || empty($prenom) || empty($numTel) || empty($numTel) || empty($numCell) || empty($Adresse) || empty($ville) || empty($codePostal) ||
        empty($age) || empty($dateInscription) || empty($courriel) || empty($user) || empty($password) || empty($statut)){
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    }
    elseif(userNameExists($user))
        {
            $error="Le nom d'utilisateur est déjà utilisé, veuillez en utilisé un autre";
            include('../errors/error.php');
        }
     else {
        $userID =  ajouter_utilisateur($user,$password,$statut);
        add_entraineur($nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$dateInscription ,$courriel,$userID);

        echo "<script type='text/javascript'>alert('Entraineur : '+ '$nom' + ' ajouté avec succès!')</script>";

        header('Location: index.php?action=entraineur_add');
    }
}
if($action =="Supprimer")
{
    $id_entraineur= $_POST['entraineurID'];
    $entraineur = get_entraineur_by_ID($id_entraineur);
    $fk_useridEntraineur= $entraineur['FK_utilisateurID'];
    supprimer_utilisateur_by_userid($fk_useridEntraineur);
    supprimer_entraineur($id_entraineur);
    echo "<script type='text/javascript'>alert('Entraineur suprimé avec succès!')</script>";
    header('Location: index.php?action=entraineur_add');
}




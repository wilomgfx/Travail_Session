<?php
function add_entraineur($nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$dateInscription ,$courriel,$userID) {
    global $db;
    $query =" INSERT INTO entraineur
                 (nom, prenom, numTel,numCell,Adresse,ville,codePostal,age,dateInscription,courriel,FK_utilisateurID)
              VALUES
                 ('$nom', '$prenom', '$numTel','$numCell','$Adresse','$ville','$codePostal',$age,'$dateInscription' ,'$courriel',$userID);";
    $query2 = "SET FOREIGN_KEY_CHECKS = 0;";
    $query3 = "SET FOREIGN_KEY_CHECKS = 1;";
    $db->exec($query2);
    $db->exec($query);
    $db->exec($query3);
}
function get_entraineurID_by_name($nom){
    global $db;
    $query = "SELECT * FROM entraineur WHERE nom = '$nom'";
    $entraineur = $db->query($query);
    $entraineur = $entraineur->fetch();
    $entraineurid = $entraineur['entraineurID'];
    return $entraineurid;
}
function get_entraineur_by_ID($id){
    global $db;
    $query = "SELECT * FROM entraineur WHERE entraineurID = $id";
    $entraineur = $db->query($query);
    $entraineur = $entraineur->fetch();
    return $entraineur;
}
function get_entraineurs(){
    global $db;
    $query = "SELECT * FROM entraineur
              ORDER  by entraineurID                     ";
    $entraineurs = $db->query($query);
    return $entraineurs;
}

function update_utilisateurID_by_entraineurID($entraineurID,$utilisateurID){
    global $db;
    $query = "UPDATE entraineur
              SET FK_utilisateurID = '$utilisateurID'
               WHERE entraineurID = '$entraineurID'";
    $db->exec($query);
}

function update_entraineur($nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$courriel,$idEntraineur) {
    global $db;
    $query = "UPDATE entraineur
              SET
                  nom = '$nom',
                  prenom = '$prenom',
                  numTel = '$numTel',
                  numCell = '$numCell',
                  adresse = '$Adresse',
                  ville = '$ville',
                  codePostal = '$codePostal',
                  age = $age,
                  courriel = '$courriel'
               WHERE entraineurID = $idEntraineur";
    $db->exec($query);
}
function get_entraineur_by_userID($userID)
{
    global $db;
    $query = "SELECT *
              FROM entraineur
              WHERE FK_utilisateurID = $userID;";
    $entraineur = $db->query($query);
    $entraineur = $entraineur->fetch();
    return  $entraineur;
}
function supprimer_entraineur($entraineurID)
{
    global $db;
    $query ="DELETE FROM entraineur WHERE entraineurID = $entraineurID";
    $db->exec($query);
    return;
}
?>
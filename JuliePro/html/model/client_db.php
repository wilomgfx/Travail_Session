<?php

function get_client()
{
    global $db;
    $query = 'SELECT * FROM client
              ORDER BY clientID';
    $clients = $db->query($query);
    return $clients;
}
function get_client_by_ID($clientID)
{
    global $db;
    $query = "SELECT * FROM client
              where clientID = '$clientID'";
    $client = $db->query($query);
    $client = $client->fetch();
    return  $client;
}
function get_client_by_name($nom)
{
    global $db;
    $query = "SELECT * FROM client
              where nom = '$nom'";
    $client = $db->query($query);
    $client = $client->fetch();
    return  $client;
}

function get_client_by_userID($userID)
{
    global $db;
    $query = "SELECT *
              FROM client
              WHERE FK_utilisateurID = $userID;";
    $client = $db->query($query);
    $client = $client->fetch();
    return  $client;
}
function inscrire_client($Nom, $Prenom, $NoTel, $NoCell, $Adresse, $Ville, $CodePostal, $Age, $DateInsc, $Courriel, $UtilisateurID,$EntraineurID)
{
    global $db;
    $query = "INSERT INTO client (nom, prenom, numTel, numCell, adresse, ville, codePostal, age, dateInscription, courriel, FK_utilisateurID,FK_entraineurID) VALUES('$Nom', '$Prenom', '$NoTel', '$NoCell', '$Adresse', '$Ville', '$CodePostal', '$Age', '$DateInsc', '$Courriel','$UtilisateurID', '$EntraineurID')";
    $query2 = "SET FOREIGN_KEY_CHECKS = 0;";
    $query3 = "SET FOREIGN_KEY_CHECKS = 1;";
    $db->exec($query2);
    $db->exec($query);
    $db->exec($query3);
}
function modifier_client($Nom, $Prenom, $NoTel, $NoCell, $Adresse, $Ville, $CodePostal, $Age, $Courriel,$ClientID)
{
    global $db;
    $query = "UPDATE client
              SET nom ='$Nom', prenom ='$Prenom', numTel ='$NoTel', numCell='$NoCell', adresse='$Adresse', ville='$Ville', codePostal='$CodePostal', age='$Age',  courriel='$Courriel'
              WHERE clientID = '$ClientID'";
    $db->exec($query);
}

// FONCTIONS RELATIVES AU CLIENT

function get_rapports_quotidiens_by_clientID()
{

}


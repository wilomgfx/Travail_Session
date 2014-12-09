<?php

function get_client()
{
    global $db;
    $query = 'SELECT * FROM client
              ORDER BY clientID';
    $client = $db->query($query);
    $client = $client ->fetch();
    return  $client;
}
function get_client_by_ID($clientID)
{
    global $db;
    $query = "SELECT * FROM client
              where clientID = '$clientID'";
    $client = $db->query($query);
    $client = $client ->fetch();
    return  $client;
}
function inscrire_client($Nom, $Prenom, $NoTel, $NoCell, $Adresse, $Ville, $CodePostal, $Age, $DateInsc, $Courriel, $UtilisateurID,$EntraineurID)
{
    global $db;
    $query = "INSERT INTO client (nom, prenom, numTel, numCell, adresse, ville, codePostal, age, dateInscription, courriel, FK_utilisateurID,FK_entraineurID) VALUES('$Nom', '$Prenom', '$NoTel', '$NoCell', '$Adresse', '$Ville', '$CodePostal', '$Age', '$DateInsc', '$Courriel','$UtilisateurID', '$EntraineurID')";
    $client = $db->query($query);
    return  $client;
}
function modifier_client($clientID, $Nom, $Prenom, $NoTel, $NoCell, $Adresse, $Ville, $CodePostal, $Age, $DateInsc, $Courriel, $UtilisateurID,$EntraineurID)
{
    global $db;
    $query = "UPDATE client
              SET nom ='$Nom', prenom ='$Prenom', numTel ='$NoTel', numCell='$NoCell', adresse='$Adresse', ville='$Ville', codePostal='$CodePostal', age='$Age', dateInscription='$DateInsc', courriel='$Courriel',FK_utilisateurID ='$UtilisateurID', FK_entraineurID='$EntraineurID'
              WHERE clientID = '$clientID'";
    $client = $db->query($query);
    $client = $client ->fetch();
    return  $client;
}


<?php

function ajouter_utilisateur($Username, $Password, $Statut)
{
    global $db;
    $query="INSERT INTO utilisateur (username, password, statut) VALUES('$Username', '$Password', '$Statut')";
    $utilisateur = $db->query($query);
    $utilisateur =  $utilisateur->fetch();
    return $utilisateur;
}
function get_utilisateur_by_id($UtilisateurID)
{
    global $db;
    $query ="Select * FROM utilisateur
             where utilisateurID = '$UtilisateurID'";
    $utilisateur = $db->query($query);
    $utilisateur =  $utilisateur->fetch();
    return $utilisateur;
}
function get_userID_by_username($Username)
{
    global $db;
    $query ="Select * FROM utilisateur
             where utilisateurID = '$Username'";
    $utilisateur = $db->query($query);
    $utilisateur =  $utilisateur->fetch();
    return $utilisateur;
}
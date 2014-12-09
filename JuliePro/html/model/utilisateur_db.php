<?php

function ajouter_utilisateur($username, $password, $statut)
{
    global $db;
    $query="INSERT INTO utilisateur
                            (username, password, statut)
                    VALUES('$username', '$password', '$statut')";
    //Pas besoins de fetch et de return une variable, on add dans la DB
    $db->exec($query);
    $userID = get_userID_by_username($username);
    return $userID;
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
function get_userID_by_username($username)
{
    global $db;
    $query ="Select * FROM utilisateur
             where username = '$username'";
    $utilisateur = $db->query($query);
    $utilisateur =  $utilisateur->fetch();
    $utilisateurID = $utilisateur['utilisateurID'];

    return $utilisateurID;
}
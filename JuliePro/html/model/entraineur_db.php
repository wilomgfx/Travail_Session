<?php
function add_entraineur($user,$password,$statut,$nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$dateInscription ,$courriel) {
    global $db;
    $query = "INSERT INTO entraineur
                 (nom, prenom, numTel,numCell,Adresse,ville,codePostal,age,dateInscription,courriel)
              VALUES
                 ('$nom', '$prenom', '$numTel','$numCell','$Adresse','$ville','$codePostal','$age','$dateInscription' ,'$courriel')";
    $db->exec($query);
    //Pour inserer dans la table utilisateur.
    $query = "INSERT INTO utilisateur
             (username,password,statut)
           VALUES
                  ('$user','$password','$statut')";
    $db->exec($query);
    $userID = get_userID_by_username($user);
    $entraineurID = get_entraineurID_by_name($nom);
    update_utilisateurID_by_entraineurID($entraineurID,$userID);
    echo "<script type='text/javascript'>alert('$userID')</script>";
}
function get_entraineurID_by_name($nom){
    global $db;
    $query = "SELECT * FROM entraineur WHERE nom = '$nom'";
    $entraineur = $db->query($query);
    $entraineur = $entraineur->fetch();
    $entraineurid = $entraineur['entraineurID'];
    return $entraineurid;
}

function update_utilisateurID_by_entraineurID($entraineurID,$utilisateurID){
    global $db;
    $query = "UPDATE entraineur
              SET FK_utilisateurID = '$utilisateurID'
               WHERE entraineurID = '$entraineurID'";
    $db->exec($query);
}

function update_entraineur($entraineurID,$nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$courriel) {
    global $db;
    $query = "UPDATE entraineur
              SET entraineurID = '$entraineurID',
                  nom = '$nom',
                  prenom = '$prenom',
                  numTel = '$numTel',
                  numCell = '$numCell',
                  adresse = '$Adresse',
                  ville = '$ville',
                  codePostal = '$codePostal',
                  age = '$age',
                  courriel = '$courriel'
               WHERE nom = '$nom'";
    $db->exec($query);
}
?>
<?php
function add_entraineur($user,$password,$statut,$nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$dateInscription ,$courriel) {
    global $db;
    $query = "INSERT INTO entraineur
                 (nom, prenom, numTel,numCell,Adresse,ville,codePostal,age,dateInscription,courriel)
              VALUES
                 ('$nom', '$prenom', '$numTel','$numCell','$Adresse','$ville','$codePostal','$age','$dateInscription' ,'$courriel')";
    $db->exec($query);
    //Pour inserer dans la table user.
    $query = "INSERT INTO utilisateur
              (username,password,statut)
              VALUES
                    ('$user','$password','$statut')";
    $db->exec($query);
}
function get_entraineur_by_name($nom){

}

function update_product($entraineurID,$nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$courriel) {
    global $db;
    $query = "UPDATE Entraineur
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
               WHERE entraineurID = '$entraineurID'";
    $db->exec($query);
}
?>
<?php
function add_entraineur($nom, $prenom, $numTel,$numCell,$Adresse,$ville,$codePostal,$age,$dateInscription ,$courriel) {
    global $db;
    $query = "INSERT INTO Entraineur
                 (nom, prenom, numTel,numCell,Adresse,ville,codePostal,age,dateInscription,courriel)
              VALUES
                 ('$nom', '$prenom', '$numTel','$numCell','$Adresse','$ville','$codePostal','$age','$dateInscription' ,'$courriel')";
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
<?php
    function get_objectifs_by_clientID($clientID)
    {
        global $db;
        $query = "SELECT * FROM objectif
                  WHERE FK_clientID = $clientID
                  ORDER BY date";
        $objectifs = $db->query($query);
        return $objectifs;
    }

    function add_objectif($nbrEntrainement, $nbrCalorieDepenseSemaine, $maxBattementObj, $nbrCalorieIngereParJour, $date, $FK_clientID)
    {
        global $db;
        $query = "INSERT INTO objectif(nbrEntrainement, nbrCalorieDepenseSemaine, maxBattementObj, nbrCalorieIngereParJour, date, FK_clientID)
                      VALUES ($nbrEntrainement, $nbrCalorieDepenseSemaine, $maxBattementObj, $nbrCalorieIngereParJour, '$date', $FK_clientID)";
        $query2 = "SET FOREIGN_KEY_CHECKS = 0;";
        $query3 = "SET FOREIGN_KEY_CHECKS = 1;";
        $db->exec($query2);
        $db->exec($query);
        $db->exec($query3);
        return;
    }
?>
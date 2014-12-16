<?php
    function get_rapports_quotidiens_by_clientID($clientID)
    {
        global $db;
        $query = "SELECT * FROM rapportquotidien
                  WHERE FK_clientID = $clientID
                  ORDER BY dateEntrainement";
        $rapports = $db->query($query);
        return $rapports;
    }
    function add_rapport_quotidien($entrainementAjout, $nbrCaloriesEntrainementAjout, $maxBattementParMinuteAjout, $nbrCaloriesIngereAjout, $dateAjout, $vo2MaxAjout, $poidsAjout, $clientID)
    {
        global $db;
        $query = "INSERT INTO rapportquotidien (entrainement, nbrCalorieDepense, maxBattement, nbrCalorieIngere, dateEntrainement, vo2Max, poids, FK_clientID)
                  VALUES ('$entrainementAjout', $nbrCaloriesEntrainementAjout, $maxBattementParMinuteAjout, $nbrCaloriesIngereAjout, '$dateAjout', $vo2MaxAjout, $poidsAjout, $clientID)";
        $query2 = "SET FOREIGN_KEY_CHECKS = 0;";
        $query3 = "SET FOREIGN_KEY_CHECKS = 1;";
        $db->exec($query2);
        $db->exec($query);
        $db->exec($query3);
        return;
    }
?>
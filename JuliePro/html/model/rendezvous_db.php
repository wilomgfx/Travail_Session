<?php
    function get_rendezvous_by_clientID($clientID)
    {
        global $db;
        $query = "SELECT * FROM rendezvous
                  WHERE FK_clientID = $clientID
                  ORDER BY date";
        $rapports = $db->query($query);
        return $rapports;
    }

    function add_rendezvous($date, $FK_entraineurID, $FK_clientID)
    {
        global $db;
        $query = "INSERT INTO rendezvous(date, FK_entraineurID, FK_clientID)
                          VALUES ('$date', $FK_entraineurID, $FK_clientID)";
        $query2 = "SET FOREIGN_KEY_CHECKS = 0;";
        $query3 = "SET FOREIGN_KEY_CHECKS = 1;";
        $db->exec($query2);
        $db->exec($query);
        $db->exec($query3);
        return;
    }
?>
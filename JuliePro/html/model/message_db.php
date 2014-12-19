<?php

function get_message_by_clientID($clientID)
{
    global $db;
    $query = "SELECT *
              FROM message
              WHERE FK_clientID = $clientID
              ORDER BY messageID;";
    $message = $db->query($query);
    return  $message;
}

function add_message($message, $nomEntraineur, $FK_clientID)
{
    global $db;
    $query = "INSERT INTO message(message, nomEntraineur, FK_clientID) VALUES('$message', '$nomEntraineur', $FK_clientID)";
    $query2 = "SET FOREIGN_KEY_CHECKS = 0;";
    $query3 = "SET FOREIGN_KEY_CHECKS = 1;";

    $db->exec($query2);
    $db->exec($query);
    $db->exec($query3);
    return;
}
?>
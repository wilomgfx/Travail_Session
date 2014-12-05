<?php

function authentify($username, $password)
{
    global $db;
    $query = "SELECT * FROM utilisateur WHERE username = '$username'";
    $user = $db->query($query);
    $user = $user->fetch();
    if (!isset($user))
        return null;
    else
    {
        if($user['password'] == $password)
            return $user;
        else
            return null;
    }
}

?>
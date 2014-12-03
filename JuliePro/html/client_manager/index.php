<?php
require('../model/database.php');
//require('../model/client_db.php');

    $action = 'client_add';

if ($action == 'client_add') {
    // Get the current category ID
    // Display the product list
    include('client_add.php');
}
?>
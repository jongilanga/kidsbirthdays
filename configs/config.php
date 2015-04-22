<?php
    //Enter your database connection details here.
    $host = 'localhost'; //HOST NAME.
    $db_name = 'children'; //Database Name.
    $db_user = 'root'; //Database User.
    $db_password = ''; //Database Password.

    try
    {
        $pdo = new PDO('mysql:host='. $host .';dbname='. $db_name, $db_user, $db_password);
    }
    catch (PDOException $e)
    {
        exit('Error Connecting to Database');
    }
?>


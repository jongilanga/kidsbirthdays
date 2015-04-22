<?php

class DBConnect {
    var $host;
    var $username;
    var $password;
    global $link;
    function connect($host, $username, $password) {
        $link = mysql_connect($host, $username, $password);
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }

        echo 'Connected successfully';
        mysql_close($link);
    }

}

$cn = new DBConnect();
$cn->connect("localhost", "root", "");

$db_selected = mysql_select_db('children', $link);
if (!$db_selected) {
    die ('Can\'t use children : ' . mysql_error());
}
    echo "DB selected succesfully!\n"

?>


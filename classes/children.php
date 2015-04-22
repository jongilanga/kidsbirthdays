<?php

class Children {
    var $fname;
    var $lname;
    var $dob;
    var $picture;

    function __construct() {
        $this->lname = "";
        $this->lname = "";
        $this->dob = "";
    }
    
    function displayName($fname, $lname, $dob) {
        echo "$fname $lname $dob\n";
    }
}

$child = new Children();

$child->displayName("Nonelela", "Tsawe", "24 April 2001");

?>

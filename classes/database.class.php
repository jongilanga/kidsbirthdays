<?php
    class Database {
        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function getData() {
            $query = $this->pdo->prepare("SELECT * FROM child ORDER BY dob ASC");
            $query->execute();
            return $query->fetchALL();
        }
        
        function insertData($fname, $lname, $dob) {
            $query = $this->pdo->prepare("INSERT INTO child values(NULL,'$fname', '$lname', '$dob')");
            $query->execute();
            var_dump($query);
            return $query->fetchALL();
        }
}
?>

<?php
    require_once 'config/config.php';
    require_once 'classes/database.class.php';

    $db = new Database($pdo);
//    $db->insertData("Odwa", "Guma", "2012-11-15");
    $row = $db->getData();

    /*function getBirthday($birthday) {
        $birthday = strtotime($birthday);
        $now = time();
        $datediff = $now - $birthday;
        $daysRemaining = floor($datediff/(60*60*24));
        return ($daysRemaining);
    }*/
    
    function getBirthday($birthday) {
        $cur_day = date('Y-m-d');
        $cur_time_arr = explode('-',$cur_day);
        $birthday_arr = explode('-',$birthday);

        $cur_year_b_day = $cur_time_arr[0]."-".$birthday_arr[1]."-".$birthday_arr[2];

        if(strtotime($cur_year_b_day) < time())
        {
            echo " Birthday already passed this year for ";
        }
        else
        {
            $diff=strtotime($cur_year_b_day)-time();//time returns current time in seconds
            echo " ". $days=floor($diff/(60*60*24)). " day(s) to go for ";
        }
    }
 
    foreach ($row as $rows) {
          echo "<pre>";
              echo $rows['fname'].  " ". $rows['lname'] . " " . $rows['dob'] . " ". getBirthday($rows['dob']) . " ".  "\n";
          echo "</pre>";
    }
?>

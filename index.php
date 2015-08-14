<?php
    require_once 'configs/config.php';
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

        /*if(strtotime($cur_year_b_day) < time())
        {
            echo " Birthday already passed this year for ";
        }
        else
        {
            $diff=strtotime($cur_year_b_day)-time();//time returns current time in seconds
            echo " ". $days=floor($diff/(60*60*24)). " day(s) to go for ";
        }*/
        $diff=strtotime($cur_year_b_day)-time();//time returns current time in seconds
         $days=floor($diff/(60*60*24));
        return $days;
    }

    /*foreach ($row as $rows) {
          echo "<pre>";
              echo $rows['fname'].  " ". $rows['lname'] . " " . $rows['dob'] . " ". getBirthday($rows['dob']) . " ".  "\n";
          echo "</pre>";
    }*/
    //Use CLICKATELL API to send you self an sms a day before your child's birthday
foreach ($row as $child) {
        if(getBirthday($child['dob']) == 15)  {
               $user = "user";
               $password = "password";
               $api_id = "apiID";
               $baseurl ="http://api.clickatell.com";

               $text = urlencode("Tomorrow is  $child[fname]'s birthday...sent by Jongi's Kid's birthdays");
               $to = "27761052812";

               // auth call
               $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";

               // do auth call
               $ret = file($url);

               // explode our response. return string is on first line of the data returned
               $sess = explode(":",$ret[0]);
               if ($sess[0] == "OK") {

                   $sess_id = trim($sess[1]); // remove any whitespace
                   $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";

                   // do sendmsg call
                   $ret = file($url);
                   $send = explode(":",$ret[0]);

                   if ($send[0] == "ID") {
                       echo "successnmessage ID: ". $send[1];
                   } else {
                       echo "send message failed";
                   }
               } else {
                   echo "Authentication failure: ". $ret[0];
               }
              //echo "Happy birthday!!!"  .$rows['fname']; 
        }
   }

<?php

echo '<table width="50%" align="center" cellpadding="0" cellspacing="0">';
echo '<tr><td height="20" colspan="2" class="footerTextW"
align="center">Controllers Online</td></tr>';

// error handler function
//OPEN UP THE VATSIM STATS FILE
    $row_count = 0;
   $color1 = "#F5F5F5";
   $color2 = "#FFFFFF";
   if(file_exists("vatsim-data.txt")){
   $fp = fopen("vatsim-data.txt", "r");

       $connect = mysqli_connect("localhost", "root", "root", "vZFW");
       $query = "SELECT * FROM positions";
       $result=mysqli_query($connect, $query);
       $positions_array = $result->fetch_array();
       $used_positions="|";
       foreach ($result as $i){
           $suffix= substr($i["abbreviation"], 0, 3);
           if (strpos($used_positions, $suffix) === false){
               $used_positions.= $suffix."|";
           }
       }
       while (!feof($fp))
         {
           $line = fgets($fp, 999);

//Take the positions we just found and find them in all of the active users. (Pulls automatically from database)

if(preg_match('/^('.$used_positions.')_[A-Z0-9]*_*(DEL|GND|TWR|APP|DEP|CTR)/',
$line))
           {
               list($position, $cid, $name, $clienttype, $frequency,
$latitude, $longitude, $altitude, $groundspeed, $planned_aircraft,
$planned_tascruise, $planned_depairport, $planned_altitude,
$planned_destairport, $server, $protrevision, $rating, $transponder,
$facilitytype, $visualrange, $planned_revision, $planned_flighttype,
$planned_deptime, $planned_actdeptime, $planned_hrsenroute,
$planned_minenroute, $planned_hrsfuel, $planned_minfuel,
$planned_altairport, $planned_remarks, $planned_route,
$planned_depairport_lat, $planned_depairport_lon,
$planned_destairport_lat,
$planned_destairport_lon, $atis_message, $time_last_atis_received,
$time_logon, $heading) = preg_split("/:/", $line);
         if($rating == 1) { $rating = "Observer"; }
         if($rating == 2) { $rating = "Ground Controller"; }
         if($rating == 3) { $rating = "Tower Controller"; }
         if($rating == 4) { $rating = "Approach Controller"; }
         if($rating == 5) { $rating = "Controller"; }
         if($rating == 7) { $rating = "Senior Controller"; }
         if($rating == 8) { $rating = "Instructor"; }
         if($rating == 10) { $rating = "Senior Instructor"; }
         if($rating == 11) { $rating = "Supervisor"; }
         if($rating == 12) { $rating = "Administrator"; }
         $rowcolor = ($row_count % 2) ? $color1 : $color2;
         $newatis = str_replace('^§', '<br>', $atis_message);
         $newatis = str_replace("'", "", $newatis);
         $newatis = str_replace('"', "", $newatis);

echo '<tr>';
echo '<td style="padding:2px" align="left" >'. $position .'</td>';
echo '<td style="padding:2px" align="right">';

//FIND THE CONTROLLER IN THE CONTROLLERS TABLE
    echo $cid. ' ';
$query = "SELECT * FROM home_roster WHERE CID = '$cid'";
$result = mysqli_query($connect,$query);
if (mysqli_num_rows($result) == 0) {
echo 'Uncertified Controller';
}
if (mysqli_num_rows($result) > 0) {
//Do something if user is a user
echo $name;
}

echo'</td>
</tr>';

         $row_count++;
           }
     }
echo '</table>';
echo '<table width="200" align="center" cellpadding="2" cellspacing="0">';


if($row_count == 0)
   {
      echo '<tr><td align="center"><br>There are no controllers
online.</td></tr>';
   }
else if($row_count == 1)
   {
      echo '<tr><td align="center"><br><span style="font-size: xx-small; ">Currently 1 ZFW
Controller Online</span></td></tr>';
   }
else
   {
         echo '<tr><td align="center"><br><span style="font-size: xx-small; ">Currently '.$row_count.'
ZFW Controllers Online</font></td></tr>';
   }
}

echo '</table>';
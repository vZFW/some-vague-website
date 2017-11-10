<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Fort Worth ARTCC</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include "../includes/header.php";?>
<div class="content">
    <?php include "../includes/left-sidebar.php";?>
    <div class="main-content" style="padding-top: 0;">
        <div class="widget">
            <div class="title">
                <h3>Fort Worth Home Controller Roster</h3>
            </div>
            <div class="roster-content">
                <table class="roster" rules="groups">
                    <thead>
                        <th>Name</th>
                        <th>Membership</th>
                        <th style="text-align: center;">Rating</th>
                        <th style="text-align: center;">ZFW</th>
                        <th style="text-align: center;">GND</th>
                        <th style="text-align: center;">TWR</th>
                        <th style="text-align: center;">APP</th>
                    </thead>
                    <?php
                    ob_start();
                    include('roster.json');
                    $roster_data = ob_get_contents();
                    ob_end_clean();
                    $roster = json_decode($roster_data, true);
                    $connect = mysqli_connect("localhost", "root", "root", "vZFW");
                    foreach ($roster as $x) {
                        $cid = $x['cid'];
                        $query = "SELECT * FROM home_roster WHERE cid=$cid";
                        $result = mysqli_query($connect, $query);
                        $data_array = $result->fetch_array();
                        if ($data_array["ZFW"]==4){
                            $ZFW = "C1";
                        } else if($data_array["ZFW"]==3) {
                            $ZFW = "S3";
                        } else if($data_array["ZFW"]==2) {
                            $ZFW = "S2";
                        } else if($data_array["ZFW"]==1) {
                            $ZFW = "S1";
                        } else if($data_array["ZFW"]==0) {
                            $ZFW = "OBS";
                        }
                        if ($data_array["TWR"]==3){
                            $TWR = "DFW";
                            $twr_color = "major-rating";
                        } else if($data_array["TWR"]==2) {
                            $TWR = "OKC";
                            $twr_color = "solo-certification";
                        } else if($data_array["TWR"]==1) {
                            $TWR = "Minor";
                            $twr_color = "major-rating";
                        } else if($data_array["TWR"]==0) {
                            $TWR = "X";
                            $twr_color = "no-rating";
                        }
                        if ($data_array["APP"]==3){
                            $APP = "REG";
                            $app_color = "major-rating";
                        } else if($data_array["APP"]==2) {
                            $APP = "OKC";
                            $app_color = "solo-certification";
                        } else if($data_array["APP"]==1) {
                            $APP = "Minor";
                            $app_color = "major-rating";
                        } else if($data_array["APP"]==0) {
                            $APP = "X";
                            $app_color = "no-rating";
                        }
                        if ($data_array["GND"]==2){
                            $GND = "DFW";
                            $gnd_color = "major-rating";
                        } else if($data_array["GND"]==1) {
                            $GND = "Minor";
                            $gnd_color = "major-rating";
                        } else if($data_array["GND"]==0) {
                            $GND = "X";
                            $gnd_color = "no-rating";
                        }

                        echo '<tr>
                        <td style="text-align: left;"><a href="../controller/'. $x["cid"] .'">'. $x["fname"] .' '. $x["lname"] .' (CB) '. $x["cid"] . '</a></td>
                        <td style="text-align: left;">Active Controller</td>
                        <td>'. $x["rating_short"] .'</td>
                        <td class="zfw-rating">'. $ZFW .'</td>
                        <td class="'. $gnd_color .'">'. $GND .'</td>
                        <td class="'. $twr_color .'">' . $TWR . '</td>
                        <td class="'. $app_color .'">'. $APP .'</td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Fort Worth Visiting Controller Roster</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <th>Name</th>
                        <th>Membership</th>
                        <th style="text-align: center;">Rating</th>
                        <th style="text-align: center;">ZFW</th>
                        <th style="text-align: center;">GND</th>
                        <th style="text-align: center;">TWR</th>
                        <th style="text-align: center;">APP</th>
                    </thead>
                    <tr>
                        <td style="text-align: left;"><a href="../controller/1311602">Krikor Hajain (KH)</a></td>
                        <td style="text-align: left;">Active Controller</td>
                        <td>C1</td>
                        <td class="zfw-rating">CTR</td>
                        <td class="major-rating">DFW</td>
                        <td class="major-rating">DFW</td>
                        <td class="major-rating">D10</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><a href="../controller/1311602">Brandon Barrett (BB)</a></td>
                        <td style="text-align: left;">Active Controller</td>
                        <td>I1</td>
                        <td class="zfw-rating">CTR</td>
                        <td class="major-rating">DFW</td>
                        <td class="major-rating">DFW</td>
                        <td class="major-rating">D10</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<p></p>
<?php include "../includes/footer.php"; ?>
</body>
</html>
<!--<script>
    $(document).ready(function(){
        $.getJSON("roster.json", function(data){
            var roster_data = '';
            $.each(data, function (key, value){
                roster_data += '<tr>';
                roster_data += '<td style="text-align: left;"><a href="../controller/'+value.cid+'">'+value.fname+' '+value.lname+' (CB) '+value.cid+'</a></td>';
                roster_data += '<td style="text-align: left;">Active Controller</td>';
                roster_data += '<td>'+value.rating_short+'</td>';
                roster_data += '<td class="zfw-rating">CTR</td>';
                roster_data += '<td class="major-rating">DFW</td>';
                roster_data += '<td class="solo-certification">OKC</td>';
                roster_data += '<td class="no-rating">X</td>';
                roster_data += '</tr>';
            });
            $('.roster').append(roster_data);
        });
    });
</script>-->
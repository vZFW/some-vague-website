<?php
session_start();
$icao = $_GET['ICAO'];
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
        <div class="apr-widget" style="background-color: white;">
            <div class="title">
                <?php
                $str= file_get_contents("https://api.aircharts.org/v2/Airport/$icao");
                $json = json_decode($str);
                ?>
                <h3><?php echo $json->$icao->info->name; ?> Airport</h3>
            </div>
            <div class="content">
                <table class="airport-info">
                    <tbody>
                    <tr>
                            <?php
                            $xmlstr = file_get_contents("http://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=1&mostRecentForEachStation=true&stationString=$icao");
                            $xml = new SimpleXMLElement($xmlstr);
                            $metar = $xml->data->METAR;

                            $achart = $json->$icao->charts->General;
                            foreach ($achart as $chart) {
                                if ($chart->chartname == "AIRPORT DIAGRAM"){
                                    echo "<td><div class='adiagram'><img src='" . $chart->url . "'/></div></td>";
                                    echo "<td class='airport-info-list' style='vertical-align: top;'>
                                        <div class='airport-name'>
                                            <h3>" . $json->$icao->info->name . " Airport</h3>
                                        </div>
                                        </td>";
                                    echo "<p class='metar'>" . $metar->raw_text . "</p>";
                                }
                            }
                            ?>
                    </tr>
                    <tr><b>ICAO: </b><p>KDFW</p></tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<p></p>
<?php include "../includes/footer.php"; ?>
</body>
</html>

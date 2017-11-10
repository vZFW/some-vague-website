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
        <div class="ap-widget" style="background-color: white;">
            <div class="title">
                <h3>Dallas Fort Worth (DFW)</h3>
            </div>
            <div class="content">
                <p>Suggested Departure Runway(s):
                    <?php
                        $xmlstr = file_get_contents("http://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=1&mostRecentForEachStation=true&stationString=kdfw");
                        $xml = new SimpleXMLElement($xmlstr);
                        $metar = $xml->data->METAR;
                        if ($metar->wind_speed_kt > 5) {
                            if ($metar->wind_dir_degrees > 90 and $metar->wind_dir_degrees <= 270) {
                                echo "17R, 18L";
                                $dfw_flow = "south";
                            } else {
                                echo "35L, 36R";
                                $dfw_flow = "north";
                            }
                        } else {
                            echo "17R, 18L"; // Calm Wind
                            $dfw_flow = "south";
                        }
                    ?>
                </p>
                <p style="padding-bottom: 20px; border-bottom: .75px solid slategray;">Suggested Arrival Runway(s):
                    <?php
                    if ($metar->flight_category != "VFR"){
                        echo "ILS ";
                        $dfw_approach = "ILS";
                    } else {
                        echo "Visual ";
                        $dfw_approach = "visual";
                    }
                    if ($metar->wind_speed_kt > 5) {
                        if ($metar->wind_dir_degrees > 90 and $metar->wind_dir_degrees <= 270) {
                            echo "17R, 18L";
                        } else {
                            echo "35C/R, 36L";
                        }
                    } else {
                        echo "17R, 18L"; // Calm Wind
                    }
                    ?>
                </p>
                <p class="metar" style="padding-top: 20px;">
                    <?php

                        echo $xml->data->METAR->raw_text;
                    ?>
                </p>
            </div>
        </div>
        <div class="ap-widget" style="background-color: white;">
            <div class="title">
                <h3>Dallas Love Field (DAL)</h3>
            </div>
            <div class="content">
                <p>Suggested Departure Runway(s):
                    <?php
                    $xmlstr = file_get_contents("http://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=1&mostRecentForEachStation=true&stationString=kdal");
                    $xml = new SimpleXMLElement($xmlstr);
                    $metar = $xml->data->METAR;
                    if ($dfw_flow == "south") {
                        echo "13L/R";
                    } else {
                        echo "31L/R";
                    }
                    ?>
                </p>
                <p style="padding-bottom: 20px; border-bottom: .75px solid slategray;">Suggested Arrival Runway(s):
                    <?php
                    if ($dfw_approach == "ILS"){
                        echo "ILS ";
                        if ($dfw_flow == "south") {
                            echo "13L/R";
                        } else {
                            echo "31L/R";
                        }
                    } else {
                        echo "Visual ";
                        if ($dfw_flow == "south") {
                            echo "13L/R";
                        } else {
                            echo "31L/R";
                        }
                    }
                    ?>
                </p>
                <p class="metar" style="padding-top: 20px;">
                    <?php

                    echo $xml->data->METAR->raw_text;
                    ?>
                </p>
            </div>
        </div>
        <div class="ap-widget" style="background-color: white;">
            <div class="title">
                <h3>Will Rodgers World (OKC)</h3>
            </div>
            <div class="content">
                <p>Suggested Departure Runway(s):
                    <?php
                    $xmlstr = file_get_contents("http://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=1&mostRecentForEachStation=true&stationString=kokc");
                    $xml = new SimpleXMLElement($xmlstr);
                    $metar = $xml->data->METAR;
                    if ($metar->wind_speed_kt > 5) {
                        if ($metar->wind_dir_degrees > 90 and $metar->wind_dir_degrees <= 270) {
                            echo "17R/L";
                        } else {
                            echo "35L/R";
                        }
                    } else {
                        echo "17R/L"; // Calm Wind
                    }
                    ?>
                </p>
                <p style="padding-bottom: 20px; border-bottom: .75px solid slategray;">Suggested Arrival Runway(s):
                    <?php
                    if ($metar->flight_category != "VFR") {
                        echo "ILS ";
                    } else {
                        echo "Visual ";
                    }
                    if ($metar->wind_speed_kt > 5) {
                        if ($metar->wind_dir_degrees > 90 and $metar->wind_dir_degrees <= 270) {
                            echo "17R/L";
                        } else {
                            echo "35L/R";
                        }
                    } else {
                        echo "17R/L"; // Calm Wind
                    }
                    ?>
                </p>
                <p class="metar" style="padding-top: 20px;">
                    <?php

                    echo $xml->data->METAR->raw_text;
                    ?>
                </p>
            </div>
        </div>
        <div class="ap-widget" style="background-color: white;">
            <div class="title">
                <h3>Lubbock Preston Smith International (LBB)</h3>
            </div>
            <div class="content">
                <p>Suggested Departure Runway(s):
                    <?php
                    $xmlstr = file_get_contents("http://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=1&mostRecentForEachStation=true&stationString=KLBB");
                    $xml = new SimpleXMLElement($xmlstr);
                    $metar = $xml->data->METAR;
                    $act_runway = 0;
                    if ($metar->wind_speed_kt > 5) {
                        if ($metar->wind_dir_degrees > 125 and $metar->wind_dir_degrees < 215) {
                            echo "17R";
                            $act_runway = 17;
                        } else if ($metar->wind_dir_degrees > 215 and $metar->wind_dir_degrees < 305){
                            echo "26";
                            $act_runway = 26;
                        } else if ($metar->wind_dir_degrees > 305 and $metar->wind_dir_degrees < 35){
                            echo "35L";
                            $act_runway = 35;
                        } else if ($metar->wind_dir_degrees > 35 and $metar->wind_dir_degrees < 125){
                            echo "8";
                            $act_runway = 8;
                        }
                    } else {
                        echo "17R"; // Calm Wind
                        $act_runway = 17;
                    }
                    ?>
                </p>
                <p style="padding-bottom: 20px; border-bottom: .75px solid slategray;">Suggested Arrival Runway(s):
                    <?php
                    if ($metar->flight_category != "VFR") {
                        if ($act_runway == 17){
                            echo "ILS ";
                        } else if ($act_runway == 35) {
                            echo "RNAV (RNP) ";
                        } else if ($act_runway == 8 || $act_runway = 26 ) {
                            echo "RNAV (GPS) ";
                        }
                    } else {
                        echo "Visual ";
                    }
                    if ($metar->wind_speed_kt > 5) {
                        if ($metar->wind_dir_degrees > 125 and $metar->wind_dir_degrees < 215) {
                            echo "17R";
                        } else if ($metar->wind_dir_degrees > 215 and $metar->wind_dir_degrees < 305){
                            echo "26";
                        } else if ($metar->wind_dir_degrees > 305 and $metar->wind_dir_degrees < 35){
                            echo "35L";
                        } else {
                            echo "8";
                        }
                    } else {
                        echo "17R"; // Calm Wind
                    }
                    ?>
                </p>
                <p class="metar" style="padding-top: 20px;">
                    <?php

                    echo $xml->data->METAR->raw_text;
                    ?>
                </p>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Regional Approach (D10) Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KDFW';">
                        <td style="text-align: center;">KDFW</td>
                        <td style="text-align: center;">DFW</td>
                        <td style="text-align: left;">Dallas Fort Worth International Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KDAL';">
                        <td style="text-align: center;">KDAL</td>
                        <td style="text-align: center;">DAL</td>
                        <td style="text-align: left;">Dallas Love Field</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KTKI';">
                        <td style="text-align: center;">KTKI</td>
                        <td style="text-align: center;">TKI</td>
                        <td style="text-align: left;">McKinney National Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KADS';">
                        <td style="text-align: center;">KADS</td>
                        <td style="text-align: center;">ADS</td>
                        <td style="text-align: left;">Addison Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KAFW';">
                        <td style="text-align: center;">KAFW</td>
                        <td style="text-align: center;">AFW</td>
                        <td style="text-align: left;">Fort Worth Alliance Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KDTO';">
                        <td style="text-align: center;">KDTO</td>
                        <td style="text-align: center;">DTO</td>
                        <td style="text-align: left;">Denton Enterprise Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KFTW';">
                        <td style="text-align: center;">KFTW</td>
                        <td style="text-align: center;">FTW</td>
                        <td style="text-align: left;">Fort Worth Meacham International Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KFWS';">
                        <td style="text-align: center;">KFWS</td>
                        <td style="text-align: center;">FWS</td>
                        <td style="text-align: left;">Fort Worth Spinks Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KGKY';">
                        <td style="text-align: center;">KGKY</td>
                        <td style="text-align: center;">GKY</td>
                        <td style="text-align: left;">Arlington Municipal Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KGPM';">
                        <td style="text-align: center;">KGPM</td>
                        <td style="text-align: center;">GPM</td>
                        <td style="text-align: left;">Grand Prairie Municipal Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KHQZ';">
                        <td style="text-align: center;">KHQZ</td>
                        <td style="text-align: center;">HQZ</td>
                        <td style="text-align: left;">Mesquite Metro Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KNFW';">
                        <td style="text-align: center;">KNFW</td>
                        <td style="text-align: center;">NFW</td>
                        <td style="text-align: left;">Fort Worth Naval Air Station JRB (Carswell Field) Airport</td>
                        <td>D10</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KRBD';">
                        <td style="text-align: center;">KRBD</td>
                        <td style="text-align: center;">RBD</td>
                        <td style="text-align: left;">Dallas Executive Airport</td>
                        <td>D10</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Fort Worth ARTCC (ZFW) Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                    <th style="text-align: center;">ICAO</th>
                    <th style="text-align: center;">IATA</th>
                    <th style="text-align: left;">Name</th>
                    <th style="text-align: center;">Area</th>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KADM';">
                        <td style="text-align: center;">KADM</td>
                        <td style="text-align: center;">ADM</td>
                        <td style="text-align: left;">Ardmore Municipal Airport</td>
                        <td>ZFW</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KCSM';">
                        <td style="text-align: center;">KCSM</td>
                        <td style="text-align: center;">CSM</td>
                        <td style="text-align: left;">Clinton-Sherman Airport</td>
                        <td>ZFW</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KGVT';">
                        <td style="text-align: center;">KGVT</td>
                        <td style="text-align: center;">GVT</td>
                        <td style="text-align: left;">Majors Airport</td>
                        <td>ZFW</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KGYI';">
                        <td style="text-align: center;">KGYI</td>
                        <td style="text-align: center;">GYI</td>
                        <td style="text-align: left;">North Texas Regional Airport/Perrin Field</td>
                        <td>ZFW</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KHOB';">
                        <td style="text-align: center;">KHOB</td>
                        <td style="text-align: center;">HOB</td>
                        <td style="text-align: left;">Lea County Regional Airport</td>
                        <td>ZFW</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KTXK';">
                        <td style="text-align: center;">KTXK</td>
                        <td style="text-align: center;">TXK</td>
                        <td style="text-align: left;">Texarkana Regional Airport-Webb Field</td>
                        <td>ZFW</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Abilene Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KABI';">
                        <td style="text-align: center;">KABI</td>
                        <td style="text-align: center;">ABI</td>
                        <td style="text-align: left;">Abilene Regional Airport</td>
                        <td>ABI</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KDYS';">
                        <td style="text-align: center;">KDYS</td>
                        <td style="text-align: center;">DYS</td>
                        <td style="text-align: left;">Dyess Air Force Base</td>
                        <td>ABI</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Altus Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KLTS';">
                        <td style="text-align: center;">KLTS</td>
                        <td style="text-align: center;">LTS</td>
                        <td style="text-align: left;">Altus Air Force Base</td>
                        <td>LTS</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Fort Still Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KFSI';">
                        <td style="text-align: center;">KFSI</td>
                        <td style="text-align: center;">FSI</td>
                        <td style="text-align: left;">Henry Post Army Airfield (Fort Sill)</td>
                        <td>FSI</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KLAW';">
                        <td style="text-align: center;">KLAW</td>
                        <td style="text-align: center;">LAW</td>
                        <td style="text-align: left;">Lawton-Fort Sill Regional Airport</td>
                        <td>FSI</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Gray Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KGRK';">
                        <td style="text-align: center;">KGRK</td>
                        <td style="text-align: center;">GRK</td>
                        <td style="text-align: left;">Robert Gray Army Airfield</td>
                        <td>GRK</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KHLR';">
                        <td style="text-align: center;">KHLR</td>
                        <td style="text-align: center;">HLR</td>
                        <td style="text-align: left;">Hood Army Airfield</td>
                        <td>GRK</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Longview Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KGGG';">
                        <td style="text-align: center;">KGGG</td>
                        <td style="text-align: center;">GGG</td>
                        <td style="text-align: left;">East Texas Regional Airport</td>
                        <td>GGG</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Lubbock Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KLBB';">
                        <td style="text-align: center;">KLBB</td>
                        <td style="text-align: center;">LBB</td>
                        <td style="text-align: left;">Lubbock Preston Smith International Airport</td>
                        <td>LBB</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Midland Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KMAF';">
                        <td style="text-align: center;">KMAF</td>
                        <td style="text-align: center;">MAF</td>
                        <td style="text-align: left;">Midland International Air and Space Port Airport</td>
                        <td>MAF</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Monroe Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KMLU';">
                        <td style="text-align: center;">KMLU</td>
                        <td style="text-align: center;">MLU</td>
                        <td style="text-align: left;">Monroe Regional Airport</td>
                        <td>MLU</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Oke City Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KOKC';">
                        <td style="text-align: center;">KOKC</td>
                        <td style="text-align: center;">OKC</td>
                        <td style="text-align: left;">Will Rogers World Airport</td>
                        <td>OKC</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KOUN';">
                        <td style="text-align: center;">KOUN</td>
                        <td style="text-align: center;">OUN</td>
                        <td style="text-align: left;">University of Oklahoma Westheimer Airport</td>
                        <td>OKC</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KPWA';">
                        <td style="text-align: center;">KPWA</td>
                        <td style="text-align: center;">PWA</td>
                        <td style="text-align: left;">Wiley Post Airport</td>
                        <td>OKC</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KTIK';">
                        <td style="text-align: center;">KTIK</td>
                        <td style="text-align: center;">TIK</td>
                        <td style="text-align: left;">Tinker Air Force Base</td>
                        <td>OKC</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>San Angelo Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KSJT';">
                        <td style="text-align: center;">KSJT</td>
                        <td style="text-align: center;">SJT</td>
                        <td style="text-align: left;">San Angelo Regional Airport/Mathis Field</td>
                        <td>SJT</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Sheppard Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KSPS';">
                        <td style="text-align: center;">KSPS</td>
                        <td style="text-align: center;">SPS</td>
                        <td style="text-align: left;">Sheppard Air Force Base/Wichita Falls Municipal Airport</td>
                        <td>SPS</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Shreveport Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KSHV';">
                        <td style="text-align: center;">KSHV</td>
                        <td style="text-align: center;">SHV</td>
                        <td style="text-align: left;">Shreveport Regional Airport</td>
                        <td>SHV</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KBAD';">
                        <td style="text-align: center;">KBAD</td>
                        <td style="text-align: center;">BAD</td>
                        <td style="text-align: left;">Barksdale Air Force Base</td>
                        <td>SHV</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KDTN';">
                        <td style="text-align: center;">KDTN</td>
                        <td style="text-align: center;">DTN</td>
                        <td style="text-align: left;">Shreveport Downtown Airport</td>
                        <td>SHV</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Waco Approach Airports</h3>
            </div>
            <div class="visiting-roster-content">
                <table class="visiting-roster" rules="groups">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ICAO</th>
                            <th style="text-align: center;">IATA</th>
                            <th style="text-align: left;">Name</th>
                            <th style="text-align: center;">Area</th>
                        </tr>
                    </thead>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KACT';">
                        <td style="text-align: center;">KACT</td>
                        <td style="text-align: center;">ACT</td>
                        <td style="text-align: left;">Waco Regional Airport</td>
                        <td>ACT</td>
                    </tr>
                    <tr class="row" style="cursor:pointer;" onclick="window.location='airport.php?ICAO=KCNW';">
                        <td style="text-align: center;">KCNW</td>
                        <td style="text-align: center;">CNW</td>
                        <td style="text-align: left;">TSTC Waco Airport</td>
                        <td>ACT</td>
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
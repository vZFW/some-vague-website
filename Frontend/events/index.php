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
        <div class="widget" style="background-color: white;">
            <div class="event-widget-title">
                <h3>Upcoming Events</h3>
            </div>
            <div class="events-content" >
                <div class="widget" style="margin-bottom: 20px;">
                    <div class="event-picture">
                        <img src="http://i.imgur.com/j4qshVH.jpg"/>
                    </div>
                    <div class="events-content" style="padding-bottom:20px;">
                        <h3>It's Going Down in the D10</h3>
                        <h4 style="margin-top: 0;">September 9th, 2017 | 2200z-0300z.</h4>
                        <p><b>It's going down in the <del>DM</del> D10</b> with Fort Worth's finest fully staffing the D10 area airports of DFW and DAL from the top down! Join us on Saturday, September 9th 2200-0300z for organized chaos, spacing procedures, frequency congestion, and more! </p>
                        <p><b><u>We will be giving away (1) TDFi 717 license and a 30 dollar voucher to TDFi randomly</u></b> to all participating pilots in celebration of the launch of Fort Worth ARTCC's Instagram @ZFWARTCC. Be sure to follow us starting September 9th  and like us on Facebook www.facebook.com/vZFWARTCC as we will post event updates, news, and more!</p>
                        <a href="event.php?id=1" class="button">View Event</a>
                    </div>
                </div>
            </div>
            <div class="events-content" >
                <div class="widget" style="margin-bottom: 20px;">
                    <div class="event-picture">
                        <img src="http://i.imgur.com/R7tOGhn.jpg"/>
                    </div>
                    <div class="events-content" style="padding-bottom:20px;">
                        <h3>It's Going Down in the D10</h3>
                        <h4>September 14th, 2017 | 2300z-0200z.</h4>
                        <p>Promo Video:https://vimeo.com/225322968</p>
                        <p>Howdy yall! Join the Forth Worth Boot Scootin' Boogie on September 14th from 2300z-0200z. Break out those regional, charter, corporate, GA, and military aircraft and celebrate the end of the week at the honkytonk!</p>
                        <b><u><p>Area Featured: Lubbock, TX KLBB</p></u></b>
                        <p>VFR/Enroute Charts - www.skyvector.com
                        <br>IFR Charts - http://www.airnav.com/airport/</p>
                        <p>See ya'll there!</p>
                        <a href="event.php?id=2" class="button">View Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
<?php include "../includes/footer.php"; ?>
</body>
</html>
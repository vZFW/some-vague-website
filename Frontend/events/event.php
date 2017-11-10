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
                <h3>It's Going Down in the D10</h3>
            </div>
            <div class="events-content" >
                <div class="widget" style="margin-bottom: 20px;">
                    <div class="event-picture">
                        <img src="http://i.imgur.com/j4qshVH.jpg"/>
                    </div>
                    <div class="event-picture">
                        <iframe width="100%" height="480"; src="https://www.youtube.com/embed/BAjtGpbLhgM" frameborder="0" allowfullscreen></iframe>
                        <div style="width: 100%; height: 0px; position: relative; padding-bottom: 50.000%;"><iframe src="https://streamable.com/s/h5qgr/ttsbat" frameborder="0" width="100%" height="100%" allowfullscreen style="width: 100%; height: 100%; position: absolute;"></iframe></div>
                        <iframe src="https://player.vimeo.com/video/172288767" width="100%" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="events-content" style="padding-bottom:20px;">
                        <h4 style="margin-top: 0;">September 9th, 2017 | 2200z-0300z.</h4>
                        <p><b>It's going down in the <del>DM</del> D10</b> with Fort Worth's finest fully staffing the D10 area airports of DFW and DAL from the top down! Join us on Saturday, September 9th 2200-0300z for organized chaos, spacing procedures, frequency congestion, and more! </p>
                        <p><b><u>We will be giving away (1) TDFi 717 license and a 30 dollar voucher to TDFi randomly</u></b> to all participating pilots in celebration of the launch of Fort Worth ARTCC's Instagram @ZFWARTCC. Be sure to follow us starting September 9th  and like us on Facebook www.facebook.com/vZFWARTCC as we will post event updates, news, and more!</p>
                        <table class="position-list">
                            <tr>
                                <td class="position-name"><p><b>Fort Worth Center</b></p></td>
                                <td class="position-person"><p>John Bartlett (JB)</p></td>
                            </tr>
                            <tr>
                                <td class="position-name"><p><b>Regional Approach</b></p></td>
                                <td class="position-person"><p>Cameron Bristol (BJ)</p></td>
                            </tr>
                            <tr>
                                <td class="position-name"><p><b>DFW Cab</b></p></td>
                                <td class="position-person"><p>Paul DoBear (PD)</p></td>
                            </tr>

                        </table>
                        <form class="event-signup">
                            <div class="label">Position Request 1</div><select>
                                <option id="1">FTW_CTR</option>
                                <option id="2">REG_APP</option>
                                <option id="3">DFW_CAB</option>
                                <option id="4">ADS_CAB</option>
                                <option id="5">TKI_CAB</option>
                            </select><br>
                            <div class="label">Position Request 2</div><select>
                                <option id="1">FTW_CTR</option>
                                <option id="2">REG_APP</option>
                                <option id="3">DFW_CAB</option>
                                <option id="4">ADS_CAB</option>
                                <option id="5">TKI_CAB</option>
                            </select><br>
                                <div class="label">Position Request 3</div><select>
                                <option id="1">FTW_CTR</option>
                                <option id="2">REG_APP</option>
                                <option id="3">DFW_CAB</option>
                                <option id="4">ADS_CAB</option>
                                <option id="5">TKI_CAB</option>
                            </select>
                            <input type="submit" value="Submit Request">
                        </form>
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
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Fort Worth ARTCC</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php include "includes/header.php";?>
    <div class="content">
        <?php include "includes/left-sidebar.php";?>
        <div class="main-content">
            <?php
            if ($error_m!="") {
                ?>
                <div class="error" style="margin-bottom: 15px;">
                    <p>Oops! It looks like <?php echo $error_m; ?></p>
                </div>
            <?php
            }
            ?>
            <div class="slider">
                <figure>
                    <a href="events/1"><img src="http://i.imgur.com/R7tOGhn.jpg"/></a>
                    <a href="events/2"><img src="http://i.imgur.com/vkP1Izn.jpg"/></a>
                    <a href="events/3"><img src="http://i.imgur.com/zZ3BCT6.jpg"/></a>
                    <a href="events/4"><img src="http://i.imgur.com/j4qshVH.jpg"/></a>
                </figure>
            </div>
            <div class="announcement-widget">
                <div class="title-inverted">
                    <h3>Announcements</h3>
                </div>
                <div class="list-group">
                    <a class="list-group-item-link" href="">
                        <table>
                            <tr>
                                <td class="label-date">09/28/2017</td>
                                <td>The i20 Poker Run is.... ON!</td>
                            </tr>
                        </table>
                    </a>
                    <a class="list-group-item-link" href="">
                        <table>
                            <tr>
                                <td class="label-date">09/28/2017</td>
                                <td>Quick update from the almighty Events Coordinator.</td>
                            </tr>
                        </table>
                    </a>
                    <a class="list-group-item-link" href="">
                        <table>
                            <tr>
                                <td class="label-date">09/28/2017</td>
                                <td>People keep saying congrats, and I don't know why. Ladies and gentlemen, introducing the new DATM.</td>
                            </tr>
                        </table>
                    </a>
                    <a class="list-group-item-link" href="">
                        <table>
                            <tr>
                                <td class="label-date">09/28/2017</td>
                                <td>Someone messed up- Joshua Hooker is now an S3!</td>
                            </tr>
                        </table>
                    </a>
                    <a class="list-group-item">
                        <table>
                            <tr>
                                <td class="label-date">09/28/2017</td>
                                <td>Here we go again... Zachary Froman is now DFW Tower Certed!</td>
                            </tr>
                        </table>
                    </a><a class="list-group-item">
                        <table>
                            <tr>
                                <td class="label-date">09/28/2017</td>
                                <td>Someone messed up- Raaj Patel is now an S2!</td>
                            </tr>
                        </table>
                    </a>

                </div>
            </div>
            <div class="widget">
                <div class="title">
                    <h3>Pilot Resources</h3>
                </div>
                <div class="pr-content">
                    <div class="two-columns">
                        <h4>Preferred Route Search</h4>
                        <input type="text" placeholder="Airport 1 (KDFW)"/>
                        <input type="text" placeholder="Airport 2 (KOKC)"/>
                        <input type="button" value="Search"/>
                    </div>
                    <div class="two-columns">
                        <h4>Airport Charts</h4>
                        <input type="text" placeholder="Airport (KDFW)"/>
                        <select>
                            <option id="0">All Charts</option>
                            <option id="1">Airport Diagrams</option>
                        </select>
                        <input type="button" value="Get That Chart!"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>
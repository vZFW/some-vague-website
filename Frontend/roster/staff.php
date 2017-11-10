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
                <h3>Fort Worth ARTCC Management Staff</h3>
            </div>
            <div class="staff-content-senior">
                <div class="position">
                    <h3>Air Traffic Manager - <a href="controllers/cnvmx">John Bartlett (JB)</a></h3>
                </div>
                <p>Howdy! I am the Air Traffic Manager for ZFW and have been controlling on the network for 7 years. Currently, I'm a Flight Instructor at the University of Oklahoma and majoring in aviation in the Professional Pilot program. Welcome aboard and Boomer Sooner!</p>
            </div>
            <div class="staff-content-senior">
                <div class="position">
                    <h3>Deputy Air Traffic Manager - <a href="controllers/cnvmx">Cameron Bristol (BJ)</a></h3>
                </div>
                <p>Hello there! I am the Deputy Air Traffic Manager for Fort Worth, and have been on the network for 9 years. I originally am from the Houston ARTCC, but I have also been a member of the CYYZ FIR, and have been serving as the ZFW DATM for 1 year. Welcome to the Fort Worth ARTCC!</p>
            </div>
            <div class="staff-content-vacant">
                <div class="position">
                    <h3>Training Administrator - <a href="apply.php">Vacant</a></h3>
                </div>
                <p>This position is currently vacant! Apply for this position <a href="apply.php">here</a>!</p>
            </div>
            <div class="staff-content">
                <div class="position">
                    <h3>Events Coordinator - <a href="controllers/cnvmx">Ethan Hawes (EH)</a></h3>
                </div>
                <p>Hello! I am the Training Administrator over here at the wonderful Fort Worth ARTCC! I've been on the VATSIM network for 2 years, and Fort Worth and Houston have been my main, and only, ARTCCs. I'm around for everything we offer, so feel free to book me for when I'm open! I'll do my best to keep my days and times up to date. If you ever have any questions, you have my email. See you on the scopes!</p>
            </div>
            <div class="staff-content">
                <div class="position">
                    <h3>Facility Engineer - <a href="controllers/cnvmx">Clay Brock (CB)</a></h3>
                </div>
                <p>Hello! I am the Facility Engineer (FE) for the ZFW ARTCC. I have been on the VATSIM network for around a year, and have been with Fort Worth since the start. I am able to conduct training for everyone up to, and including, the C1 (Center) rating. I'm happy to help you learn new material, answer any questions, and make your experience here at Fort Worth awesome! See you on the scopes!</p>
            </div>
            <div class="staff-content-vacant">
                <div class="position">
                    <h3>Web Master - <a href="apply.php">Vacant</a></h3>
                </div>
                <p>This position is currently vacant! Apply for this position <a href="apply.php">here</a>!</p>
            </div>
        </div>
        <div class="widget">
            <div class="title">
                <h3>Fort Worth ARTCC Training Staff</h3>
            </div>
            <div class="staff-content">
                <div class="position">
                    <h3>Instructors</h3>
                </div>
                    <ul>
                        <li><a href="controllers/cnvmx">John Bartlett (JB)</a></li>
                        <li><a href="controllers/cnvmx">Cameron Bristol (CB)</a></li>
                    </ul>
            </div>
            <div class="staff-content">
                <div class="position">
                    <h3>Mentors</h3>
                </div>
                <ul>
                    <li><a href="controllers/cnvmx">Ethan Hawes (EH)</a></li>
                    <li><a href="controllers/cnvmx">Clay Brock (CB)</a></li>
                </ul>
            </div>
            <div class="staff-content">
                <div class="position">
                    <h3>Mentors in Training</h3>
                </div>
                <ul>
                    <li><a href="controllers/cnvmx">Paul DoBear (PB)</a></li>
                    <li><a href="controllers/cnvmx">Josh Hooker (JH)</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<p></p>
<?php include "../includes/footer.php"; ?>
</body>
</html>
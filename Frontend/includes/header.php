<?php
session_start();
$uCID = $_SESSION['CID'];
$connect = mysqli_connect("localhost", "root", "root", "vZFW");
$query = "SELECT * FROM Users WHERE cid = '$uCID'";
$result = mysqli_query($connect, $query);
$data = $result->fetch_array();
$D_CID = $data[0];
$status = $data[11];
/*if ($data==""){
        $error_m = "NO DATA RETURNED FOR THAT USER";
} else {*/
    if ($D_CID!=""){
        if ($status==0) {

            $error_m = "your application is still pending approval! Please allow up to 72 hours for an administrator to get back to you. Has 72 hours passed? Email the <a href='mailto:datm@vzfw.org'>DATM</a>.";

            session_destroy();
        } else if ($status==1) {

            $error_m = "your account has gone inactive due to a lack of controlling. Email the <a href='mailto:datm@vzfw.org'>DATM</a> if you have a question regarding your status.";

            session_destroy();
        } else if ($status==2) {

            $error_m = "your account has been removed by an administrator! Email the <a href='mailto:datm@vzfw.org'>DATM</a> if you have a question regarding your status.";

            session_destroy();
        }
    }
/*}*/
?>
<nav class="nav-main">
    <ul>
        <li>
            <a href="http://localhost/ZFW/Frontend/index.php" class="nav-item">Home</a>
        </li>
        <li>
            <a href="" class="nav-item">Information</a>
            <div class="nav-content">
                <div class="nav-sub">
                    <ul>
                        <li><a href="http://localhost/ZFW/Frontend/roster/index.php" class="nav-sub-item">ARTCC Roster</a></li>
                        <li><a href="http://localhost/ZFW/Frontend/roster/staff.php" class="nav-sub-item">ARTCC Staff</a></li>
                        <li><a href="http://localhost/ZFW/Frontend/events/index.php" class="nav-sub-item">Events Department</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-item">Pilots</a>
            <div class="nav-content">
                <div class="nav-sub">
                    <ul>
                        <li><a href="http://localhost/ZFW/Frontend/PAC/index.php" class="nav-sub-item">Pilot Assistant Center</a></li>
                        <li><a href="http://localhost/ZFW/Frontend/PAC/feedback.php" class="nav-sub-item">Pilot Feedback</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <a href="" class="nav-item">Controllers</a>
            <div class="nav-content">
                <div class="nav-sub">
                    <ul>
                        <li><a href="" class="nav-sub-item">Training Materials</a></li>
                        <li><a href="" class="nav-sub-item">Controller Downloads</a></li>
                        <li><a href="" class="nav-sub-item">Controller Statistics</a></li>
                        <li><a href="http://localhost/ZFW/Frontend/IDS" class="nav-sub-item">ZFW IDS</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <a href="http://www.zfwartcc.net/forum/index.php" class="nav-item">Forums</a>
        </li>
    </ul>
    <div class="nav-right">
        <ul>
            <li>
                <?php
                if ($_SESSION['first_name']==""){
                    ?>
                    <a href="http://localhost/ZFW/SSO" class="nav-item">Login</a>
                <?php
                } else {
                    ?>
                    <a href="http://localhost/ZFW/Frontend/logout.php" class="nav-item">Howdy,
                        <?php
                        echo $_SESSION['first_name']
                        ?>
                    </a>
                <?php
                }
                ?>

            </li>
        </ul>
    </div>
</nav>
<div class="header-overlay">
<div class="header">
    <div class="headerContent">
        <!--<h1>Fort Worth ARTCC</h1>-->
        <img src="http://localhost/ZFW/Frontend/IMG/ZFWLogo.png"/>
        <h3 style="font-weight: 350;">Air Route Traffic Control Center</h3>
    </div>
    <div class="onlineList">
        <table>
            <tr>
                <td><p>Fort Worth Center</p></td>
                <td><div class="box-online">ONLINE</div></td>
            </tr>
            <tr>
                <td><p>Approach</p></td>
                <td><div class="box-online">REG</div></td>
            </tr>
            <tr>
                <td><p>DFW Airport</p></td>
                <td><div class="box">OFFLINE</div></td>
            </tr>
            <tr>
                <td><p>DAL Airport</p></td>
                <td><div class="box">OFFLINE</div></td>
            </tr>
            <tr>
                <td><p>OKC Airport</p></td>
                <td><div class="box">OFFLINE</div></td>
            </tr>
            <tr>
                <td><p>LBB Airport</p></td>
                <td><div class="box">OFFLINE</div></td>
            </tr>
        </table>
        </ul>
    </div>
</div>
    </div>
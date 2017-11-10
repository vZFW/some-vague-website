<?php
session_start();
$error_m = "";
$success_m = "";
if (isset($_POST['submit'])){
    if ($_POST['rating']>-2 && $_POST['CID']!="" && $_POST['name']!="" && $_POST['email']!="" && $_POST['voh']!=0 && $_POST['why']!="" && $_POST['comments']!="" && $_POST['confirm']=="on"){
        $connect = mysqli_connect("localhost", "root", "root", "vZFW");
        $CID = $_SESSION['CID'];
        $fname = $_SESSION['first_name'];
        $lname = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $rating_id = $_SESSION['rating_id'];
        $rating_short = $_SESSION['rating_short'];
        $reason = $_POST['why'];
        $comments = $_POST['comments'];
        $type = $_POST['voh'];
        $date = date("Y-m-d");
        $query = "INSERT INTO Users(cid, name_first, name_last, rating_id, rating_short, email, member_date) VALUES ('$CID','$fname','$lname','$rating_id','$rating_short','$email','$date')";
        $result = mysqli_query($connect, $query);
        $query2 = "INSERT INTO applications(cid, reason, comments, date, type) VALUES ('$CID', '$reason', '$comments','$date','$type')";
        $result1 = mysqli_query($connect, $query2);
        $success_m = "Your application has been submitted! We'll get back to you shortly!"/*$CID . " ". $reason . " " . $comments. " " . $type . " " . $date*/;
    } else {
        $error_m = "you are missing required pieces of information!";
    }
}

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
    <div class="main-content"style="padding-top: 0;">
        <?php if ($error_m!=""){?>
        <div class="error">
            <p>Oops! Looks like <?php echo $error_m; /*echo $_POST['rating']. " " . $_POST['CID']. " " . $_POST['name']. " " . $_POST['email']. " " . $_POST['voh']. " " . $_POST['why']. " " . $_POST['comments']. " " . $_POST['confirm']=="on"*/?> </p>
        </div>
        <?php
        } else if ($success_m!=""){
            ?>
        <div class="success">
            <p>Success! <?php echo $success_m; ?></p>
        </div>
        <?php
        }
        ?>
        <div class="widget">
            <div class="title">
                <h3>New Controller Sign Up</h3>
            </div>
            <div class="feedback-content">
                <p>You have found this page because you have expressed interest in becoming a Fort Worth Controller. Great! We're happy to have you! Please complete the following forum and submit for approval by the administrators. Please allow for up to 72 hours for a response regarding your application.</p>
                <form method="post" action="new_user.php" id="apply">
                    <div class="forum-full-column">
                        <input type="text" name="name" value="Name: <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];?>" readonly/>
                    </div>
                    <div class="forum-two-columns">
                        <input type="text" name="CID" value="Your VATSIM ID: <?php echo $_SESSION['CID']; ?>" style="margin-bottom: 20px;" readonly/>
                        <select name="rating" style="margin-bottom: 20px;">
                            <option value="-2" <?php if($_SESSION['rating_id'] == -2){?>selected="selected"<?php;}?>>Please Select Your Rating</option>
                            <option value="-1" <?php if($_SESSION['rating_id'] == -1){?>selected="selected"<?php;}?>>Inactive (Ineligible)</option>
                            <option value="0" <?php if($_SESSION['rating_id'] == 0){?>selected="selected"<?php;}?>>Suspended (Ineligible)</option>
                            <option value="1" <?php if($_SESSION['rating_id'] == 1){?>selected="selected"<?php;}?>>Observer (OBS)</option>
                            <option value="2" <?php if($_SESSION['rating_id'] == 2){?>selected="selected"<?php;}?>>Student 1 (S1)</option>
                            <option value="3" <?php if($_SESSION['rating_id'] == 3){?>selected="selected"<?php;}?>>Student 2 (S2)</option>
                            <option value="4" <?php if($_SESSION['rating_id'] == 4){?>selected="selected"<?php;}?>>Student 3 (S3)</option>
                            <option value="5" <?php if($_SESSION['rating_id'] == 5){?>selected="selected"<?php;}?>>Controller (C1)</option>
                            <option value="7" <?php if($_SESSION['rating_id'] == 7){?>selected="selected"<?php;}?>>Senior Controller (C3)</option>
                            <option value="8" <?php if($_SESSION['rating_id'] == 8){?>selected="selected"<?php;}?>>Instructor (I1)</option>
                            <option value="10" <?php if($_SESSION['rating_id'] == 10){?>selected="selected"<?php;}?>>Senior Instructor (I3)</option>
                            <option value="11" <?php if($_SESSION['rating_id'] == 11){?>selected="selected"<?php;}?>>Supervisor (SUP)</option>
                            <option value="12" <?php if($_SESSION['rating_id'] == 12){?>selected="selected"<?php;}?>>Administrator (ADM)</option>
                        </select>
                        <textarea name="why" placeholder="Why do you want to join the ZFW ARTCC?" id="pos"style="margin-bottom: 20px;"></textarea>
                        </div>
                    <div class="forum-two-columns">
                        <input type="text" name="email" value="Email: <?php echo $_SESSION['email'];?>" style="margin-bottom: 20px;" readonly/>
                        <select class="roster-controllers" name="voh" style="margin-bottom: 20px;">
                            <option value="0">Visitor or Home Controller?</option>
                            <option value="1">Visiting Controller</option>
                            <option value="2">Home Controller</option>
                        </select>
                        <textarea name="comments" placeholder="Anything we should know about you?" id="neg"style="margin-bottom: 20px;"></textarea>
                    </div>
                    <div class="forum-centered">
                        <input name="confirm" type="checkbox"/><label name="confirm">I agree to all of the rules, regulations, and guidelines set forth in the <a href="https://www.dropbox.com/sh/ch9774k28vtgtdo/AAApLhqOKmI_PXDqVbXkas18a/ARTCC%20Library/SOPs?dl=0&preview=ZFW+ARTCC+SOP.pdf">ZFW ARTCC SOP</a></label>
                        <input type="submit" value="Submit your Application" name="submit" style="background-color: #4CAF50;border: none;font-size: 14px;color: white;padding-top: 5px;padding-bottom: 5px;width: 100%;text-decoration: none;cursor: pointer;"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "../includes/footer.php"; ?>
</body>
</html>
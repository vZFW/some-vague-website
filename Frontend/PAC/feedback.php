<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "vZFW");
if (isset($_POST["submit"])){
    if ($_POST["name"]!="" && $_POST["CID"]!="" && $_POST["position"]!="None" && $_POST["rating"]!=0 && $_POST["well"]!="" && $_POST["poor"]!=""){
        $cid=$_POST["CID"];
        $name=$_POST["name"];
        $date=date("Y-m-d");
        $rating=$_POST["rating"];
        $feedback_type=$_POST["type"];
        $position=$_POST["position"];
        $good=$_POST["good"];
        $bad=$_POST["bad"];
        if ($_POST["request"]=="on"){
            $response=1;
        } if ($_POST["request"]==""){
            $response=0;
        }
        $query="INSERT INTO feedback(cid, full_name, date, position_abreviation, rating, feedback_type, good, bad, response) VALUES ('$cid','$name','$date','$position','$rating','$feedback_type','$good','$bad','$response')";
        $result=mysqli_query($connect, $query) or $error_m="a database error occurred. Please try again later.";
        $success_m="Thank you for your feedback has been submitted";
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
                <h3>Controller Feedback</h3>
            </div>
            <div class="feedback-content">
                <form method="post" action="feedback.php">
                    <div class="forum-full-column">
                       <input type="text" name="name" placeholder="Your Full Name" style="width: 100%;"/>
                    </div>
                    <div class="forum-two-columns">
                        <input type="text" placeholder="Your VATSIM ID" name="CID" style="margin-bottom: 20px; width:100%;"/>
                        <select name="rating" style="margin-bottom: 20px;">
                            <option value="0">Rate this controller</option>
                            <option value="1">1 (Awful)</option>
                            <option value="2">2 (Mediocre)</option>
                            <option value="3">3 (Average)</option>
                            <option value="4">4 (Good)</option>
                            <option value="5">5 (Exemplary)</option>
                        </select>
                        <textarea placeholder="What did we do well on?" name="well"style="margin-bottom: 20px; width: 100%;"></textarea>
                        <input name="request" type="checkbox"/><label>Request response from ARTCC staff</label>
                    </div>
                    <div class="forum-two-columns">
                        <select class="roster-controllers" name="position" style="margin-bottom: 24px;">
                            <option value="None">Select position being worked</option>
                            <?php
                            $query = "SELECT * FROM positions";
                            $result = mysqli_query($connect, $query);
                            $i==1;
                            foreach ($result as $x){
                                ?><option value='<?php echo $x['abbreviation']?>'><?php echo $x['abbreviation']?> (<?php echo $x['phonetic']?>)</option>";<?php
                            }
                            ?>
                        </select>
                        <select class="roster-controllers" name="type" style="margin-bottom: 20px;">
                            <option value="0">Type of Feedback</option>
                            <option value="1">General ARTCC Feedback</option>
                            <option value="2">Website Feedback</option>
                            <option value="3">Operations Feedback</option>
                            <option value="4">Training Feedback</option>
                            <option value="5">Other</option>
                        </select>
                        <textarea placeholder="What did we do poorly on?" name="poor" style="margin-bottom: 20px; width:100%;"></textarea>
                    </div>
                    <div class="forum-centered">
                        <input type="submit" name="submit" value="Submit Feedback" style="background-color: #4CAF50;border: none;color: white;padding-top: 7px;padding-bottom: 7px;padding-left: 20px;padding-right: 20px;width: 100%;text-decoration: none;cursor: pointer;font-size: 15px;"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "../includes/footer.php"; ?>
</body>
</html>
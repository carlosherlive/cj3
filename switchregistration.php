<?
if(isset($_POST['accountUser']) && isset($_POST['accountPassword'])) {
include("dbase.php");
include("settings.php");
    if ($_POST['accountType']=="member"){
        $database="chatusers";
    } else if ($_POST['accountType']=="model") {
        $database="chatmodels";
    } else if ($_POST['accountType']=="studioop") {
        $database="chatoperators";
    }
    $userExists=false;
    $result = mysql_query("SELECT id,user,password,status FROM $database WHERE status!='pending' AND status!='' ");
    while($row = mysql_fetch_array($result)) {
        $tempUser=$row["user"];
        $tempPass=$row["password"];
        $tempId=$row["id"];
        if ($_POST['accountUser']==$tempUser && md5($_POST['accountPassword'])==$tempPass) {
            if ($row["status"]=="blocked") {
                $userExists=true;
                $errorMsg="Account is blocked, please contact the administrator for more details";
            } else {
            $userExists=true;
            $currentTime=time();
            mysql_query("UPDATE $database SET lastLogIn='$currentTime' WHERE id = '$tempId' LIMIT 1");
            setcookie("usertype", $database, time()+360000);
            setcookie("id", $tempId, time()+360000);
            header("Location: cp/$database/");
            }
        }
    }
    if (!$userExists) {
    $errorMsg="Wrong username or password.";
    }
} else if (isset($_GET['from']) && $_GET['from']=="recoverpass") {
    $errorMsg="Your new password has been sent to your email address";
} else {
    $errorMsg="";
}
include("_main.header.php");
?>

<div class="body-container">
    <div class="col-md-12" align="center">
        <img src="images/white-bg-login-clean.png" class="w3-hide-small">

        <img src="images/white-bg-login-little.png" class="w3-hide-large  w3-round w3-border" style="width:90%;box-shadow: 0 4px 6px 1px rgba(34,34,34,0.4);">

        <a href="registration/user.php" style="position: absolute;left: 50%;top: 25%;"><button class="btn w3-hide-small" style="color:#000">Members</button></a>
        <a href="registration/user.php" style="position: absolute;left: 14%;top: 75%;"><button class="btn w3-hide-large" style="color:#000">Members</button></a>

        <a href="registration/model.php" style="position: absolute;left: 50%;top: 45%;""><button class="btn w3-hide-small" style="color:#000">Performer</button></a>
        <a href="registration/model.php" style="position: absolute;left: 60%;top: 75%;""><button class="btn w3-hide-large" style="color:#000">Performer</button></a>
    </div>
</div>

<?
include("_main.footer.php");
?>

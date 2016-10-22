<?php
session_start();
if(!isset($_SESSION['current_user'])){
    header('Location: error.php');
    exit;
}
if(!isset($_POST['receiver']) or !isset($_POST['message'])) {
    header('Location: error.php');
    exit;
}
if(isset($_POST['when'])) {
    require_once('messenger.php');
    $msnger = new Messenger($_SESSION['current_user']);
    if($_POST['when'] == "now"){
        $msnger->send_message($_POST['receiver'], $_POST['message']);
        echo "<h3>sent</h3><br/>";
    } else {
        $msnger->send_future_message($_POST['receiver'], $_POST['message'], $_POST['month'], $_POST['day'], $_POST['hour'], $_POST['minute']);
        echo "<h3>will be sent</h3><br/>";
    }
    echo "<a href='main.php'>Go back to the main page</a>";
}
?>

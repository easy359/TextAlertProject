<!DOCTYPE html>
<style>
    td {
        padding: 5px;
    }
    h1 {
        display: inline-block;
    }
</style>
<h1>SENT MESSAGES</h1>
<a href="main.php">Go back to the main page</a>
<?php
session_start();
if(!isset($_SESSION['current_user'])) {
    header('Location: error.php');
    exit;
}
require_once('connection.php');
$con = Connection::getInstance('textalertusers');
$query = "SELECT receiver, message, datetime FROM previousinfo WHERE username=?";
$params = array($_SESSION['current_user']);
$result = $con->query($query, $params, true);
$table = "<table border='1px'>";
$table .= "<th>Receiver</th>";
$table .= "<th>Message</th>";
$table .= "<th>Datetime</th>";
foreach($result as $row) {
    $table .= "<tr>";
    $table .= "<td>".$row['receiver']."</td>";
    $table .= "<td>".$row['message']."</td>";
    $table .= "<td>".$row['datetime']."</td>";
    $table .= "</tr>";
}
$table .= "</table>";
echo $table;
?>
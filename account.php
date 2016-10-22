<?php
session_start();
if(!isset($_SESSION['current_user'])) {
    $_SESSION['index-display'] = 'login';
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Text Alert</title>
        <link rel="stylesheet" type="text/css" href="styles/index-layout.css"/>
        <link rel="stylesheet" type="text/css" href="styles/account.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="nav-bar">
            <a class="nav-link-left" href="index.php">
                Text Alert Project
            </a>
            <a class='nav-link-right' href='user_logout.php'>
                Logout
            </a>
            <a class='nav-link-right' href='main.php'>
                <?php echo $_SESSION['current_user']; ?> - Send a Message
            </a>
        </div>
        <div class="separator-large"></div>
        <div class="title">
            <b>View Text Table</b>
        </div>
        <div class="center">
            <div class="separator"></div>
            <a id="future" class="button-toggle button-toggle-highlight" href="#">
                FUTURE
            </a>
            <a id="sent" class="button-toggle" href="#">
                SENT
            </a>
        </div>
        <div class="separator"></div>
        <script>
            var table = 'future';
            $(document).ready(function() {
                $('#future').click(function(e) {
                    e.preventDefault();
                    $('#future').addClass('button-toggle-highlight');
                    $('#sent').removeClass('button-toggle-highlight');
                    $('#future-table').removeClass('hide');
                    $('#send-table').addClass('hide');
                    table = 'future';
                });
                $('#sent').click(function(e) {
                    e.preventDefault()
                    $('#future').removeClass('button-toggle-highlight');
                    $('#sent').addClass('button-toggle-highlight');
                    $('#future-table').addClass('hide');
                    $('#send-table').removeClass('hide');
                    table = 'send';
                });
            });
        </script>
        <div>
            <?php
            require_once('connection.php');
            $con = Connection::getInstance("textalertusers");
            $query = "SELECT receiver, message, datetime FROM messageinfo WHERE username=?";
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
            echo "<div id='future-table' class='center'>";
            echo $table;
            echo "</div>";
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
            echo "<div id='send-table' class='center hide'>";
            echo $table;
            echo "</div>";
            ?>
        </div>
    </body>
</html>

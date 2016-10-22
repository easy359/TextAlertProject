<?php
if(isset($_POST['create_name']) and isset($_POST['create_password'])) {
    session_start();
    $username=$_POST['create_name'];
    $password=$_POST['create_password'];
    if(strlen($username) > 4 or strlen($password) > 4) {
        require_once('connection.php');
        $con = Connection::getInstance("textalertusers");
        $query = 'SELECT username FROM userinfo WHERE username=?';
        $params = array($username);
        $result = $con->query($query, $params, True);
        if(!$result) {
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO userinfo (username, password) VALUES (?, ?)";
            $params = array($username, $hashed);
            $con->query($query, $params);
            $_SESSION['current_user'] = $username;
            header('Location: main.php');
        } else {
            $_SESSION['create_error'] = "the username " . $username . " already exists";
            $_SESSION['index-display'] = 'create';
            header('Location: index.php');
        }
    } else {
        $_SESSION['create_error'] = "username and password must be at least 5 characters long";
        $_SESSION['index-display'] = 'create';
        header('Location: index.php');
    }
}
?>

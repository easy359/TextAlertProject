<?php
if (isset($_POST['username']) and isset($_POST['password'])){
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(strlen($username) > 4 and strlen($password) > 4) {
        require_once('connection.php');
        $con = Connection::getInstance('textalertusers');
        $query = "SELECT username, password FROM userinfo WHERE username=?";
        $params = array($username);
        $result = $con->query($query, $params, True);
        if($result) {
            if(password_verify($password, $result[0]['password'])) {
                $_SESSION['current_user'] = $result[0]['username'];
                header('Location: main.php');
            } else {
                $_SESSION['login_error'] = "username and password do not match";
                $_SESSION['index-display'] = 'login';
                header('Location: index.php');
            }
        } else {
            $_SESSION['login_error'] = "user " . $username . " was not found";
            $_SESSION['index-display'] = 'login';
            header('Location: index.php');
        }
    } else {
        $_SESSION['login_error'] = "username and password must be at least 5 characters long";
        $_SESSION['index-display'] = 'login';
        header('Location: index.php');
    }
}

?>

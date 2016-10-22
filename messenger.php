<?php
final class Messenger {
    private static $account_sid = '';
    private static $auth_token = '';
    private static $from = '';
    private $client;
    private $username;

    public function __construct($username) {
        $this->username = $username;
        require_once('twilio-php-master/Services/Twilio.php');
        $this->client = new Services_Twilio(self::$account_sid, self::$auth_token);
    }

    public function send_message($receiver, $message) {
        try {
            $this->client->account->messages->create(array(
                'To' => $receiver,
                'From' => self::$from,
                'Body' => $this->username . " says: " . $message. " (via TextAlertProject).",
            ));
            require_once('connection.php');
            $con = Connection::getInstance("textalertusers");
            $query = "INSERT INTO previousinfo (MID, username, receiver, message, datetime) VALUES (?,?,?,?,?)";
            $now = new DateTime();
            $params = array($this->random_MID($con), $_SESSION['current_user'], $receiver, $message, $now->format('Y-m-d H:i:s'));
            $con->query($query, $params);
        } catch (Services_Twilio_RestException $e) {
            echo $e->getMessage();
        }
    }

    public function send_future_message($receiver, $message, $month, $day, $hour, $minute) {
        date_default_timezone_set('America/New_York');
        $datetime = new DateTime(date('Y') . "-" . $month . "-" . $day . " " . $hour . ":" . $minute . ":00");
        $now = new DateTime();
        if($datetime < $now) {
            $datetime->modify('+1 year');
        }
        require_once('connection.php');
        $con = Connection::getInstance("textalertusers");
        $query = "INSERT INTO messageinfo (MID, username, receiver, message, datetime) VALUES (?,?,?,?,?)";
        $params = array($this->random_MID($con), $_SESSION['current_user'], $receiver, $message, $datetime->format('Y-m-d H:i:s'));
        $con->query($query, $params);
    }

    private function random_MID($con) {
        require_once('connection.php');
        $rand;
        $result;
        do {
            $rand = rand(10000000, 99999999);
            $query = "SELECT MID FROM messageinfo WHERE MID=?";
            $params = array($rand);
            $result = $con->query($query, $params, true);
            $query = "SELECT MID FROM previousinfo WHERE MID=?";
            $result2 = $con->query($query, $params, true);
        } while ($result or $result2);
        return $rand;
    }
}
?>

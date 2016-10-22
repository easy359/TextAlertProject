<?php
final class Connection {
    private static $instances = array();
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    //data base handler       
    private static $DBH;
    private $database;

    private function __construct($database) {
    	$this->database = $database;
        try {
            $this->DBH = new PDO("mysql:host=".self::$host.";dbname=$database", self::$user, self::$pass);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    //insure singleton instance per database
    public static function getInstance($database) {
        foreach (static::$instances as $key => $value) {
            if ($key == $database) {
                return $value;
            }
        }
        $instance = new Connection($database);
        static::$instances[$database] = $instance;
        return $instance;
    }

    public function __destruct() {
        static::$instances[$this->database] = null;
        $this->DBH = null;
    }


    public function query($query, array $params = null, $return = false) {
        try {
            if(is_null($params)){
                $STH = $this->DBH->query($query);
                if($return) {
                    return $STH->fetchAll();
                }
            } else {
                $STH = $this->DBH->prepare($query);
                $STH->execute($params);
                if($return) {
                    return $STH->fetchAll();
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>

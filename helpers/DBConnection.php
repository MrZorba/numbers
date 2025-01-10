<?php

class DBConnection {


    private $con = null;
    private static $connectionURL = "mysql:host=127.0.0.1;port=3307;dbname=numberwale";
    // private static $connectionURL = "mysql:host=localhost;dbname=numbek4f_root";

    public function __construct() {
        $this->connect();
    }

    public function getCon() {
        return $this->con;
    }

    public function connect() {
        try {
            $this->con = new PDO(self::$connectionURL, 'root', '');
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function close($con, $stmt = null, $res = null) {
        try {
            if ($res) {
                $res->closeCursor();
            }

            if ($stmt) {
                $stmt = null;
            }

            if ($con) {
                $con = null;
            }
        } catch (PDOException $e) {
            die("Error closing resources: " . $e->getMessage());
        }
    }

    public static function main() {
        $db = new DBConnection();
        if ($db->getCon()) {
            echo "Connection successful!";
        }
    }
}

?>
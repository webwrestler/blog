<?php

class DataBasa{

     public static function getConnection()
    {
        $paramPath = ROOT . '/config/db.php';
        $params = include($paramPath);

        try {
            $DataBasa = new PDO("mysql:host={$params['host']};dbname={$params['databasa']}",
            $params['user'], $params['password']);
            $DataBasa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return$DataBasa;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>
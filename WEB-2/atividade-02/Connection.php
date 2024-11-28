<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Connection{
    private static $conn = null;

    public static function getConnection(){
        
        if(self::$conn == null){
            $opcoes = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            $strConn = "mysql:host=localhost:3306;dbname=produtos";

            self::$conn = new PDO($strConn, "root", "", $opcoes);
        }
        return self::$conn;
    }
}
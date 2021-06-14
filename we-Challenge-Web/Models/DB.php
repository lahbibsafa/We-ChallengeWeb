<?php

class DB {
    public static $host = "localhost";
    public static $port = 3306;
    public static $dbName = "wechallenge"; 
    public static $username = "root";
    public static $password = "";
    public static $pdo = null;
    private static function connect(){
        try {
            self::$pdo = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$dbName, self::$username, self::$password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e) {
            die($e->getMessage());
        }
    }
    public static function getLastId(){
        return self::$pdo->lastInsertId();
    }
    public static function query($sql, $params){
        if(self::$pdo == null){
            self::connect();
        }
        $statement = self::$pdo->prepare($sql);
        $statement->execute($params);
        if (explode(' ', $sql)[0] === "SELECT"){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}

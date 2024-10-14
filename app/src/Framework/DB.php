<?php

namespace App\Framework;

use PDO;
use PDOException;

class DB
{

    // static PDO $connection ;
    private static $pdo = null;

    public static function connect()
    {

        # Set db conn parameters in /config/config.php
        $conn = DB_CONNECTION;

        // $host = '192.168.0.114';
//            $host = 'localhost';
//            $host = 'db';
//            $port = '3306';
//            $db = 'mvcdemo';
//            $user = 'mvcdemo';
//            $pass = 'mvcdemo2004';
//            $charset = 'utf8mb4';


        $db_host = $conn['host'];
        $db_port = $conn['port'];
        $db_name = $conn['db'];
        $db_user = $conn['user'];
        $db_pass = $conn['pass'];
        $db_charset = $conn['charset'] ?? 'utf8mb4';

//            $user = 'root';
//            $pass = 'root';
        $env= getenv();
        $db_host = $env['db_host'] ?? $db_host;
        $db_port = $env['db_port'] ?? $db_port;
        $db_name = $env['db_name'] ?? $db_name;
        $db_user = $env['db_user'] ?? $db_user;
        $db_pass = $env['db_pass'] ?? $db_pass;

        $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=$db_charset";

        try {
            // Create a new PDO instance with error mode set to exceptions
            $pdo = new PDO($dsn, $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //  echo "Connected successfully!";
        } catch (PDOException $e) {
            // Catch any PDO exceptions and display the error message
            echo "Connection failed: " . $e->getMessage();
            throw $e;
        }

        self::$pdo = $pdo;
        return $pdo;

    }


    public static function exec($sql, array $params = [])
    {

//            trace($sql);
//            trace($params);

        self::connect();

        $stmt = self::$pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $key = ":$key";
            $stmt->bindValue($key, $value);

        }


        //  $stmt->debugDumpParams();
        // Execute the statement and check for errors
        if (!$stmt->execute()) {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo()); // Use stmt's errorInfo to get specific error details
            return false; // Return false on failure
        }

        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            print_r(self::$pdo->errorInfo());
        }

        return $stmt;
    }

    public static function query($sql, array $params = [])
    {
        $stmt = self::exec($sql, $params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public static function getByID($sql, $id)
    {
        $stmt = self::exec($sql, $params = ['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function insert($sql, array $params)
    {
        self::exec($sql, $params);
        return self::$pdo->lastInsertId();
    }

    public static function update(string $qry, array $params, $id)
    {
        self::exec($qry, $params);
    }
}
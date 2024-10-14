<?php

//const ROOT_DIR = 'C:\www\Credissimo\mvc';
//const TEMPLATES_DIR = ROOT_DIR . '\src\Views\Templates\\';





// $host = '192.168.0.114';
//            $host = 'localhost';
//            $host = 'db';
//            $port = '3306';
//            $db = 'mvcdemo';
//            $user = 'mvcdemo';
//            $pass = 'mvcdemo2004';
//            $charset = 'utf8mb4';

const DB_CONNECTION = [

//    $host = 'localhost';
    'host' => 'db',
   // 'host' => '192.168.0.114',
    'port' => '3306',
    'db' => 'mvc_db',
    'user' => 'mvc_user',
    'pass' => 'mvc_password',
    'charset' => 'utf8mb4',

];


// $host = '192.168.0.114';



const ROOT_DIR = __DIR__ . '/../';
const TEMPLATES_DIR = ROOT_DIR . '/src/Views/Templates/';

const views = [
    'user.index' => TEMPLATES_DIR . 'user.index.php',
    'user.details' => TEMPLATES_DIR . 'user.details.php',
    'user.create' => TEMPLATES_DIR . 'user.create.php',
    'user.edit' => TEMPLATES_DIR . 'user.edit.php',
    'user.delete' => TEMPLATES_DIR . 'user.delete.php',

];



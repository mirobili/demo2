<?php

declare(strict_types=1);

use App\Controllers\DefaultController;
use App\Framework\DB;
use PHPUnit\Framework\TestCase;
use App\Framework\Router;
//require_once 'app.php';

class EndToEnd extends TestCase
{


    public function setUp():void
    {
        Router::reset();

    }

    public function tearDown():void
    {

//        print_r(Router::getRoutes());
//        Router::get('http://localhost:8888/test',  DefaultController::class , 'index' ,[]);
//        print_r(Router::getRoutes());
       Router::reset();
//        print_r(Router::getRoutes());
    }

    public function testTearDown_cleaning(){

        $this->assertEquals(1,1);

    }


    function test_db_is_connected(){

        $res= DB::query("SELECT 1");
        $actual=$res[0][1];
        $this->assertEquals(1,  $actual);

    }



    function test_end_to_end_endpoint_from_db(){

        $url = 'http://localhost:8888/customer/listdb/1';
        $content = file_get_contents($url);
        $expected = '{"id":"1","name":"Miro","address":"Sofia 1000","phone":"+359 882220002","email":"miroslav.biliarski@gmail.com","created_at":"","updated_at":""}';
        $this->assertEquals($expected, $content);

        $url = 'http://localhost:8888/customer/listdb/2';
        $content = file_get_contents($url);
        $expected = '{"id":"2","name":"Ivan Ivanov","address":"Sofia 1111","phone":"+359 700 12 012","email":"office@credissimo.bg","created_at":"","updated_at":""}';
        $this->assertEquals($expected, $content);
    }



}

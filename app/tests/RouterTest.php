<?php

declare(strict_types=1);

use App\Controllers\DefaultController;
use PHPUnit\Framework\TestCase;
use App\Framework\Router;
//require_once 'app.php';

class RouterTest extends TestCase
{

        public function setUp():void
    {
        Router::reset();
    }

    public function tearDown():void
    {
        Router::reset();
    }

    public function del_testTearDown_cleaning(){

    }

    public function test_ADD_Router_route_THEN_route_is_present(){

        $method="POST";
        $uri='http://localhost:8888/DummyUri';
        $controllerClass='ControllerClassName';
        $action='index';
        $params=[];
        $redirect_to='';
        $is_rest= '';

        $expected=[
            'method' => $method,
            'route' => $uri,
            'controller' => $controllerClass,
            'action' => $action,
            'params' => $params,
            'redirect_to' => $redirect_to,
            'is_rest' => $is_rest,
        ];



        Router::route($method, $uri,  $controllerClass , $action, $params,$redirect_to);
        $actual =  Router::getRoute($method, $uri);

        trace($expected);
        trace( $actual);

        $this->assertEquals($expected, $actual);

    }

    public function test_ADD_route_using_get_THEN_route_is_present(){

        $method="GET";
        $uri='http://localhost:8888/DummyUri';
        $controllerClass='ControllerClassName';
        $action='index';
        $params=[];
        $redirect_to='';
        $is_rest = '';

        $expected=[
            'method' => $method,
            'route' => $uri,
            'controller' => $controllerClass,
            'action' => $action,
            'params' => $params,
            'redirect_to' => $redirect_to,
            'is_rest' => $is_rest,
        ];

        Router::get( $uri,  $controllerClass , $action, $params);

        $actual =  Router::getRoute($method, $uri);
        $this->assertEquals($expected, $actual);


    }

    public function test_ADD_route_using_post_THEN_route_is_present(){

        $method="POST";
        $uri='http://localhost:8888/DummyUri';
        $controllerClass='ControllerClassName';
        $action='index';
        $params=[];
        $redirect_to='redirect_path';
        $is_rest = '';
        $expected=[
            'method' => $method,
            'route' => $uri,
            'controller' => $controllerClass,
            'action' => $action,
            'params' => $params,
            'redirect_to' => $redirect_to,
             'is_rest' => $is_rest
        ];

        Router::post( $uri,  $controllerClass , $action, $params,$redirect_to);

        $actual =  Router::getRoute($method, $uri);
        $this->assertEquals($expected, $actual);

    }



}

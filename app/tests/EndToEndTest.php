<?php

class EndToEndTest extends \PHPUnit\Framework\TestCase
{
    function test_end_to_end_endpoint_from_db(){

        $url = 'http://localhost:8888/customer/list/1';
        $content = file_get_contents($url);
        $expected = '{"id":"1","name":"Miro","address":"Sofia 1000","phone":"+359 882220002","email":"miroslav.biliarski@gmail.com","created_at":"","updated_at":""}';
        $expected = '{"id":1,"name":"Miro","address":"Sofia 1000","phone":"+359 882220002","email":"miroslav.biliarski@gmail.com","created_at":"2024-10-08 22:06:34","updated_at":"2024-10-08 22:09:27"}';
        $this->assertEquals($expected, $content);

        $url = 'http://localhost:8888/customer/list/2';
        $content = file_get_contents($url);
        $expected = '{"id":2,"name":"Ivan Ivanov","address":"Sofia 1111","phone":"+359 700 12 012","email":"office@credissimo.bg","created_at":"2024-10-08 22:08:41","updated_at":"2024-10-08 22:08:41"}';
        $this->assertEquals($expected, $content);
    }
}
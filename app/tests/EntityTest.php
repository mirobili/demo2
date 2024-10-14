<?php

declare(strict_types=1);

use App\Controllers\DefaultController;
use App\Entities\Customer;
use PHPUnit\Framework\TestCase;
use App\Framework\Router;

//require_once 'app.php';

class EntityTest extends TestCase
{


    public function setUp(): void
    {
        //  Router::reset();

    }

    public function tearDown(): void
    {

    }


    public function testEntity(): void
    {
        $customer = new \App\Entities\Customer(1, 'ivan', 'sofia', '+359 700 12 012', 'miroslav.biliarski@gmail.com', '2022-12-12', '2022-12-12');
        $this->assertEquals('ivan', $customer->getName());
        $this->assertEquals('sofia', $customer->getAddress());
        $this->assertEquals('+359 700 12 012', $customer->getPhone());
        $this->assertEquals('miroslav.biliarski@gmail.com', $customer->getEmail());
        $this->assertEquals('2022-12-12', $customer->getCreatedAt());
        $this->assertEquals('2022-12-12', $customer->getUpdatedAt());
    }

    public function test_customer_inseret_to_the_database()
    {
        $customer = new \App\Entities\Customer(null, 'ivan', 'sofia', '+359 700 12 012', 'miroslav.biliarski@gmail.com', '2022-12-12', '2022-12-12');

        $customer->save();
        $id = $customer->getId();
        $newCustomer = Customer::get($id);

        $this->assertEquals($newCustomer->getName(), $customer->getName());
        $this->assertEquals($newCustomer->getAddress(), $customer->getAddress());
        $this->assertEquals($newCustomer->getPhone(), $customer->getPhone());
        $this->assertEquals($newCustomer->getEmail(), $customer->getEmail());


    }


    public function test_customer_update_to_the_database()
    {

        $id = 3;
        $timestamp = date('Y-m-d H:i:s');


        $customer = Customer::get($id);
        $customer->setName('testName_' . $timestamp);
        $customer->setAddress('testAddress_' . $timestamp);
        $customer->setPhone('testPhone_' . $timestamp);
        $customer->setEmail('testEmail_' . $timestamp);

        $customer->save();

        unset($customer);

        $updatedCustomer = Customer::get($id);

        $this->assertEquals('testName_' . $timestamp, $updatedCustomer->getName());
        $this->assertEquals('testAddress_' . $timestamp, $updatedCustomer->getAddress());
        $this->assertEquals('testPhone_' . $timestamp, $updatedCustomer->getPhone());
        $this->assertEquals('testEmail_' . $timestamp, $updatedCustomer->getEmail());

    }



//    public function test_customer_load_relations()
//    {
//
//        $customer = Customer::get(2); //
////        trace($customer);
////
////        $contracts = $customer->getContracts();
//////        trace($contracts);
////        trace($customer);
//////
////        $customer->loadRelations();
////
////        $customer->references['contract'];
////        trace($customer->references);
////
////
////        trace($customer );
//
//
//    }



}

<?php

declare(strict_types=1);

use App\Controllers\DefaultController;
use App\Entities\Customer;
use App\Framework\DB;
use PHPUnit\Framework\TestCase;
use App\Framework\Router;

//require_once 'app.php';

class RestRequestsTest extends TestCase
{


    public function setUp(): void
    {
    }

    public function tearDown(): void
    {
    }

    public function testCreateEntityFromArray()
    {

        // id, name, address, phone, email, created_at, updated_at

        $array = [
            //'id' => 1,
            'name' => 'JohnDoe de REST',
            'address' => 'Meta HQ',
            'phone' => '+359 700 12 012',
            'email' => 'John.Doe@gmail.com',
        ];

        $customer = Customer::makeFromArray($array);

        $this->assertEquals("", $customer->getId());

        $customer->save();

        $this->assertNotEquals(0, $customer->getId());

//
//
//
//
//        $NewCustomer = Customer::get($customer->getId());
//
//        trace("--------------------------");
//        trace($NewCustomer);
//
//
//        $this->assertEquals(1,1);

    }

    public function test_Create_Entity_From_Partial_Array()
    {

        // id, name, address, phone, email, created_at, updated_at

        $array = [
            //'id' => 1,
            'name' => 'JohnDoe de REST',
            'address' => 'Meta HQ Partial Data',
            'phone' => '+359 700 12 012',
            'email' => 'John.Doe@gmail.com',
        ];

        $customer = Customer::makeFromArray($array);
        $this->assertEquals("", $customer->getId());
        $customer->save();
        $this->assertNotEquals(0, $customer->getId());
    }

    public function test_Update_Entity_From_Partial_Array()
    {

        // id, name, address, phone, email, created_at, updated_at
        $id = 68;

        $customer = Customer::get($id);

       //  $old_name = $customer->getName();
        $new_name = "JohnDoe de REST" . ' - ' . date('Y-m-d H:i:s');
        $array = [
            'id' => 68,
            'name' => $new_name,
            //'address' => 'Meta HQ Partial Data Updated ',
        ];



        $customer = Customer::updateFromArray($customer,$array);
        //$this->assertEquals("", $customer->getId());
        $customer->save();
        $this->assertNotEquals(0, $customer->getId());

        unset($customer);

        $customer = Customer::get($id);
        $this->assertEquals($new_name, $customer->getName());
    }

}

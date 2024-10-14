<?php

use App\Controllers\Rest\CustomerRestController;
use App\Entities\Customer;
use App\Framework\RestClient;
use App\Framework\Router;

class RestControllerTest extends \PHPUnit\Framework\TestCase
{
    public function test_calling_HANDLE_adds_GET_POST_PUT_PATCH_DELETE_routes()
    {
        Router::handle('/customer_rest', CustomerRestController::class, $_REQUEST);
        $routes = Router::getRoutes();

        $this->assertEquals(5, count($routes));
    }

    public function test_make_POST_requests()
    {
        # Setup router for handling REST Requests:

        $request = [
            'id' => '69',
            'name' => 'Miro',
            'address' => 'Sofia+1000',
            'phone' => '+359+882220002',
            'email' => 'miroslav.biliarski@gmail.com',
            'created_at' => '2024-10-08+22:06:34',
            'updated_at' => '2024-10-08+22:09:27'
        ];

        Router::handle('/customer_rest', CustomerRestController::class, $request);
        $customer = Router::dispatch('POST', '/customer_rest');



        $this->assertEquals($request,  $customer);

    }


    public function test_make_GET_requests()
    {
        # Request payload
        $request = [
            'id' => '69',
        ];

        # Configure routes
        Router::handle('/customer_rest', CustomerRestController::class, $request);

        # Make the request
        $customer = Router::dispatch('GET', '/customer_rest');

        $this->assertEquals($request['id'], $customer['id']);
    }

    public function test_make_PATCH_requests(){

        $request=[
            'id'=> '69',
            'address'=> 'Barcelona 1171 '. date('Y-m-d H:i:s'),
        ];

        Router::handle('/customer_rest', CustomerRestController::class,  $request );
        Router::dispatch('PATCH', '/customer_rest');

        $address = Customer::get($request['id'])->getAddress();

        $this->assertEquals($request['address'], $address);

    }
 public function test_make_DELETE_requests(){

        $request=[
            'id'=> '69',
        ];

        Router::handle('/customer_rest', CustomerRestController::class,  $request );


        $this->expectExceptionMessage('not implemented');

        Router::dispatch('DELETE', '/customer_rest');
    }



    public function test_rest_client(){

        $method='GET';
        $url = 'http://localhost/customer_rest/';
        $data=['id'=> '69',];

        $rest_client = new RestClient();
        $res= $rest_client->CallAPI($method, $url, $data );
        trace($res);

//        {"id":69,"name":"Miro","address":"Sofia+1000 88333333","phone":"+359+882220002","email":"miroslav.biliarski@gmail.com","created_at":"2024-10-10 21:48:38","updated_at":"2024-10-12 03:11:43"}


    }
    public function test_rest_client_post(){

        $method='POST';
        $url = 'http://localhost/customer_rest/';
        $data='{"id":69,"name":"Miro","address":"Sofia+1000 8833111","phone":"+359+882220002","email":"miroslav.biliarski@gmail.com","created_at":"2024-10-10 21:48:38","updated_at":"2024-10-12 03:11:43"}';
        $data = json_decode($data, true);

        $rest_client = new RestClient();
        $res= $rest_client->CallAPI($method, $url, $data );
        trace($res);
    }


}
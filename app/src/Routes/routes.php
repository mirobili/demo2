<?php

namespace App;

use App\Controllers\HtmxController;
use App\Controllers\ContractController;
use App\Controllers\CustomerController;
use App\Controllers\DefaultController;
use App\Controllers\RatesController;
use App\Controllers\Rest\CustomerRestController;
use App\Framework\Router;


/***********************************************************************************************************************/

        /***** REST CONTROLLERS *****/

//trace($_GET);
//trace($_POST);
//trace($_REQUEST);
$request = (!empty($_REQUEST)) ? $_REQUEST : json_decode(file_get_contents("php://input"), true);
// $raw_request = json_decode(file_get_contents("php://input"), true);

 // dd($raw_request);
Router::handle('/customer_rest', CustomerRestController::class, $request);
Router::handle('/contract_rest', ContractRestController::class, $request);



/***********************************************************************************************************************/

//
//Router::route('GET', '/customer_rest', CustomerController::class, 'get');
//Router::route('POST', '/customer_rest', CustomerController::class, 'post');
//Router::route('PUT', '/customer_rest', CustomerController::class, 'put');
//Router::route('PATCH', '/customer_rest', CustomerController::class, 'patch');
//Router::route('DELETE', '/customer_rest', CustomerController::class, 'delete');



/***********************************************************************************************************************/



Router::route('GET', '/test', DefaultController::class, 'index', []);
Router::route('GET', '/customer', CustomerController::class, 'list');
Router::route('GET', '/customer/new', CustomerController::class, 'form');
Router::route('GET', '/customer/{id}', CustomerController::class, 'form');
Router::route('GET', '/customer/{id}/edit', CustomerController::class, 'form');
Router::route('GET', '/customer/{id}/json', CustomerController::class, 'get_customer');
Router::route('GET', '/customer/form', CustomerController::class, 'form');
Router::route('GET', '/customer/list', CustomerController::class, 'list');
Router::route('GET', '/customer/list/{id}', CustomerController::class, 'get_customer');

        /***** POST *****/

// Router::route('POST', '/customer/save', CustomerController::class, 'save', $_POST,  );
Router::route('POST', '/customer/save', CustomerController::class, 'save', $_POST, '/customer/{id}');

/***********************************************************************************************************************/
    // TODO make EntityController
Router::route('GET', '/entity/{class}/{id}', CustomerController::class, 'get_entity',['class','id'] );

/***********************************************************************************************************************/

//Router::route('GET', '/RestController', UserRestController::class, 'index', []);

/***********************************************************************************************************************/

Router::route('GET', '/', HtmxController::class, 'index'    );
Router::route('GET', '/htmx/load/{path}', HtmxController::class, 'load' ,$_GET ); /////  TODO
Router::route('GET', '/htmx/{fragment}', HtmxController::class, 'get_fragment');
Router::route('GET', '/htmx/navigation', HtmxController::class, 'navigation');

Router::route('GET', '/htmx/load/{path} ', HtmxController::class, 'load', ); /////  TODO
// TODO ---- This feature not present .. don't know how to describe it ..... May be not needed
Router::route('GET', '/htmx/load/{path}/{id}', HtmxController::class, 'load', ['path','id']); /////  TODO

/***********************************************************************************************************************/

Router::route('GET', '/contract', ContractController::class, 'index');
Router::route('GET', '/contract/{id}', ContractController::class, 'index');

/***********************************************************************************************************************/

Router::route('GET', '/rates', RatesController::class, 'index');
Router::route('GET', '/rates/{code}/{param2}', RatesController::class, 'currency_params',['code','param2'] );
Router::route('GET', '/rates/{code}', RatesController::class, 'currency');

/***********************************************************************************************************************/
//
//Router::route('GET', '/user/hello', UserController::class, 'index', $name ?? null);
//Router::route('GET', '/user/index', UserIndexView::class, 'render', ['name' => '1111111111111'] ?? null);
//Router::route('GET', '/user/hello/{id}', UserController::class, 'index', $name2 ?? null);
//Router::route('GET', '/user/hello/{id}', UserController::class, 'default', $name2 ?? null);

/***********************************************************************************************************************/

// Get the request method (GET, POST, PUT, DELETE, etc.)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Get the request URI (strip query parameters)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Dispatch the request based on the method and URI
$response = Router::dispatch($requestMethod, $requestUri);

// Output the response (this could be HTML, JSON, etc.)
if (is_string($response)) {
    echo $response;
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
}
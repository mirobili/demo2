<?php



namespace App\Controllers;

use App\Entities\Contract;
use App\Entities\Customer;
use App\Framework\Controller;
use App\Framework\DB;
use App\Views\Components\HtmlTable;
use App\Views\CustomerFormView;
use App\Views\Templates\CustomerListView;


class ContractController extends Controller
{
//    public function form($id = '')
//    {
//
////        $data = [
////            'name' => 'John Doe'
////            , 'email' => 'john.doe@example.com'
////            , 'phone' => '(123) 456-7890'
////            , 'location' => 'New York, USA'
////        ];
////
////        $data = [
////            'name' => 'Miroooo'
////            , 'email' => 'mirobili@data.bg'
////            , 'phone' => '+359 88 222 3429'
////            , 'location' => 'Sofia Bulgaria'
////        ];
//
//
//
//       // $id = 123456;
////        $name = 'miro balearski:' . $id;
////        $address = 'sofia 1000';
////        $phone = '+3598812345689';
////        $email = 'allaballa@gmail.com';
////        $created_at = 'created';
////        $updated_at = "updated";
////        $data = compact(   'id' ,
////            'name'  ,
////            'address',
////            'phone' ,
////            'email' ,
////            'created_at',
////            'updated_at'   );
//
//        $customers = [];
////        $data[123] = ['id' => 123, 'name' => 'miro', 'address' => 'sofia 1000', 'phone' => '+359 88 222 3429', 'email' => 'allaballa-hello@gmail', 'created_at' => 'created', 'updated_at' => 'today'];
////        $data[124] = ['id' => 124, 'name' => 'pesho', 'address' => 'Varna 1000', 'phone' => '+359 88 000 0011', 'email' => 'allaballa_zaza@gmail', 'created_at' => 'created', 'updated_at' => 'yesterday'];
////        $data[500] = ['id' => 500, 'name' => 'Gosho', 'address' => 'Burgas 1000', 'phone' => '555-1234', 'email' => 'allaballa1235468@gmail', 'created_at' => 'created', 'updated_at' => 'long time ago'];
//
//        $customers[123] = $customer = new Customer(123, 'Miro', 'Sofia 1000', '+359 882223429', 'miroslav.biliarski@gmail.com');
//        $customers[124] = new Customer(124,'pesho', 'Varna 1000', '+359 88 000 0011', 'allaballa_zaza@gmail', 'created', 'yesterday');
//        $customers[500] = new Customer(500, 'Gosho', 'Burgas 1000', '555-1234', 'allaballa1235468@gmail', 'created', 'long time ago');
//
//      //  return $id;
//        // print_r($customer->toArray()   );
//       // return $customer->toArray();
//
//        //return json_encode($data[123]) ;
//        $data = isset($customers[$id]) ? $customers[$id]->toArray() : [] ;
//
//        return CustomerFormView::render($data);
//
//    }
//




    public function save(){
        extract($_POST);
        $customer = new Customer($id, $name, $address, $phone, $email);
        //print_r( $customer);
        return  ( $customer->toArray() );
    }

    public function create()
    {
        return $this->view('user/create');
    }

    public function edit()
    {
        $id = 123;
        $user = UserEntity::findByID($id);
        if ($user) {
            $user->setEmail('mirobili@data.bg');
            $user->save();
            $message = 'User updated';
        } else {
            $message = 'User not found';
        }

        return $this->view('user/edit', ['message' => $message]);
    }

    public function show()
    {
        return $this->view('user/show');
    }

    public function delete()
    {
        return $this->view('user/delete');
    }

    public function index()
    {


        $list = Contract::find();

        $data = [];
       // trace($list);
        foreach($list as $ee){
            $data[]=(array)$ee;
//            $data[]=$ee->toArray();
        }

      //  return $data;


       return  HtmlTable::render($data,  $names=[] ,   'Table 1' ) ;
    }

//    public function list_db()
//    {
//        $customers =  Customer::find();
//        return  HtmlTable::render($customers,  $names =[] ,   'Customers List from DB' ) ;
//    }

    public function get_customer($id=0)
    {
        $customer =  Customer::get($id );
        return  $customer->toArray() ;
    }
}
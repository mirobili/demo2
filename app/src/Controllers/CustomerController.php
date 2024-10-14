<?php


namespace App\Controllers;

use App\Entities\Customer;
use App\Framework\Controller;
use App\Framework\DB;
use App\Framework\Entity;
use App\Views\Components\HtmlTable;
use App\Views\CustomerFormView;
use App\Views\Templates\CustomerListView;


class CustomerController extends Controller
{
    public function form($id = '')
    {
        $customer = Customer::get($id);
        $data = $customer->toArray();

        return CustomerFormView::render($data);
    }


    public function save($array)
    {
        $customer = Customer::makeFromArray($array);
        $customer->save();

        return ($customer->toArray());
    }

    public function create()
    {
        return $this->view('user/create');
    }


    public function list()
    {
      //  return '';
        
        $customers = Customer::find();
        return HtmlTable::render($customers, $names = [], 'Customers List from DB');
    }

    public function get_customer($id = 0)
    {
        $customer = Customer::get($id);
        return $customer->toArray();
    }

    public function get_entity($class,$id)
    {
        $entity= Entity::getEntity($class,$id);
        return $entity->toArray();
    }


//    public function edit()
//    {
//        $id = 123;
//        $user = UserEntity::findByID($id);
//        if ($user) {
//            $user->setEmail('mirobili@data.bg');
//            $user->save();
//            $message = 'User updated';
//        } else {
//            $message = 'User not found';
//        }
//
//        return $this->view('user/edit', ['message' => $message]);
//    }

    public function show()
    {
        return $this->view('user/show');
    }

    public function delete()
    {
        return $this->view('user/delete');
    }

//    public function list()
//    {
//        $data[]=[ 'id'=>123, 'name'=>'miro', 'address'=>'sofia 1000', 'phone'=>'+359 88 222 3429', 'email'=>'allaballa-hello@gmail'];
//        $data[]=[ 'id'=>124, 'name'=>'pesho', 'address'=>'Varna 1000', 'phone'=>'+359 88 000 0011', 'email'=>'allaballa_zaza@gmail'];
//        $data[]=[ 'id'=>500, 'name'=>'Gosho', 'address'=>'Burgas 1000', 'phone'=>'555-1234', 'email'=>'allaballa1235468@gmail'];
//
//     //   $names =  [ 'id', 'name', 'address', 'phone', 'email'] ;
//        $names = [];
//
//        return  HtmlTable::render($data,  $names  ,   'Table 1' ) ;
//    }
}
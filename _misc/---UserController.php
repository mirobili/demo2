<?php

namespace _misc;

use App\Controllers\UserEntity;
use App\Framework\Controller;
use App\Views\UserIndexView;

class UserController extends Controller
{
    public function index($name = '')
    {

    $data=[
        'name' => 'John Doe'
        ,'email'  => 'john.doe@example.com'
        ,'phone' => '(123) 456-7890'
        ,'location' => 'New York, USA'
       ];

    $data=[
        'name' => 'Miroooo'
        ,'email'  => 'mirobili@data.bg'
        ,'phone' => '+359 88 222 3429'
        ,'location' => 'Sofia Bulgaria'
       ];

        return UserIndexView::render($data);

    }

    public function create()
    {
        return $this->view('user/create');
    }

    public function edit()
    {
        $id= 123;
        $user = UserEntity::findByID(   $id);
        if($user){
            $user->setEmail('mirobili@data.bg');
            $user->save();
            $message= 'User updated';
        }else{
            $message= 'User not found';
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
}
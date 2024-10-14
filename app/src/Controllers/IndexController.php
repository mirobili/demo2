<?php

namespace App\Controllers;

use App\Framework\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $this->view('index', ['message'=>'helllloooooo']);
    }

    public function notFound()
    {
        http_response_code(404);
        return "eror 404";

        //$this->view('index', ['message'=>'helllloooooo']);
    }


}
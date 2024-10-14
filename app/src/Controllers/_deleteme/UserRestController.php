<?php

namespace App\Controllers\_deleteme;

use App\Framework\RestController;

class UserRestController extends RestController
{

    public function index()
    {
        $data = ['message' => "hello user", 'current_time' => date("Y-m-d H:i:s")];
        return $this->json($data);
    }
}
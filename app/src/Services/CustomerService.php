<?php

namespace App\Services;

class CustomerService
{
    public function get($id)
    {
        $customer = EntityService::get('\App\Entities\Customer', $id);
        return $customer;
    }

    public function save($customer)
    {
        EntityService::save($customer);
    }
}
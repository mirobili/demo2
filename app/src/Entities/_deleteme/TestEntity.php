<?php

namespace App\Entities\_deleteme;

use App\Framework\Entity;

class TestEntity extends Entity
{
    public function __construct()
    {
        parent::__construct();
        $this->loadRelations();
    }

    protected static string $table_name = 'test_table';
    protected static array $relations = [
                    'services' => [
                    'type' => 'hasMany'
                    , 'local' => 'id'
                    , 'references' => 'App\Entities\Service.contract_id'],

                    'tickets' => [
                    'type' => 'hasMany'
                    , 'local' => 'id'
                    , 'references' => 'App\Entities\_deleteme\Ticket.contract_id'],

                    'contracts' => [
                    'type' => 'hasMany'
                    , 'local' => 'id'
                    , 'references' => 'App\Entities\_deleteme\Ticket.contract_id'],

                    'owner' => [
                    'type' => 'hasOne'
                    , 'local' => 'customer_id'
                    , 'references' => 'App\Entities\Customer.id'],
                    ];


    private $name, $email, $username, $pass, $office_id;

    public function getOfficeId()
    {
        return $this->office_id;
    }

    public function setOfficeId($office_id): void
    {
        $this->office_id = $office_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass): void
    {
        $this->pass = $pass;
    }




}
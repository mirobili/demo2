<?php

namespace App\Entities;

use App\Framework\Entity;

class Customer extends Entity
{
    public static string $table_name = 'customer';
   // protected string $id, $name, $address, $phone, $email,$created_at,$updated_at;

    public static array $fillable = ['id', 'name', 'address', 'phone', 'email','created_at','updated_at'];




    public function __construct(protected   $id='',protected string $name='', protected string $address='',  protected string $phone='', protected string $email='', protected string $created_at='', protected string $updated_at='')
    {

    }

    protected static array $relations = [
        "contracts" => [
            'type' => 'hasMany'
            , 'local' => 'id'
            , 'references' => 'App\Entities\Contract.customer_id'
        ]
    ];


    public function getContracts(){
        if(!isset($this->collections['contract']))
            $this->collections['contract']= $this->loadRelations('contracts');
        return $this->collections['contract'];
    }

    public function getId()
    {
        return $this->id;
    }

    protected  function setId($id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }


}
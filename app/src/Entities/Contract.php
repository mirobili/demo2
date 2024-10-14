<?php

namespace App\Entities;

use App\Framework\Entity;

class Contract extends Entity
{
   // protected $customer_id,$valid_from,$valid_to,$status,$created_at,$updated_at ;
    static protected  $fillable = ['id', 'code', 'customer_id', 'valid_from', 'valid_to', 'status', 'created_at', 'updated_at'];

    public function __construct(protected $id=null, protected $code=null, protected $customer_id=null, protected $valid_from=null, protected $valid_to=null, protected $status=null,
                                protected $created_at=null, protected $updated_at=null)
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code): void
    {
        $this->code = $code;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function setCustomerId($customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    public function getValidFrom()
    {
        return $this->valid_from;
    }

    public function setValidFrom($valid_from): void
    {
        $this->valid_from = $valid_from;
    }

    public function getValidTo()
    {
        return $this->valid_to;
    }

    public function setValidTo($valid_to): void
    {
        $this->valid_to = $valid_to;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}
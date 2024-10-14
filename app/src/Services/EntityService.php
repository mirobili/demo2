<?php

namespace App\Services;

use App\Framework\EntityInterface;
use App\Storage\Storage;

class EntityService
{
  public function get(EntityInterface $class, $id)
  {
    $class='\App\Entities\\' . ucfirst(strtolower($class) );
    $entity = Storage::getEntity($class, $id);;
    return $entity;
  }

  public function save( EntityInterface $entity){
        Storage::save($entity);
  }
}
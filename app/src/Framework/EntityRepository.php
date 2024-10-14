<?php

namespace App\Framework;

use App\Storage\Storage;
use Exception;

class EntityRepository
{
    public static function get($class_name, $id)
    {
        if (!class_exists($class_name)) {
            throw new Exception("Class $class_name not found");
        }
        return Storage::findByID(self::class, $id);
    }

    public static function findByID($class_name, $id)
    {
        if (!class_exists($class_name)) {
            throw new Exception("Class $class_name not found");
        }
        return Storage::findByID(self::class, $id);
    }

//    public static function findAll($class_name)
//    {
//        if (!class_exists($class_name)) {
//            throw new Exception("Class $class_name not found");
//        }
//        return Storage::findAll(self::class);
//    }

    public static function find($class_name, $criteria)
    {
        if (!class_exists($class_name)) {
            throw new Exception("Class $class_name not found");
        }
        return Storage::find(self::class, $criteria);
    }

    public static function findFirst($class_name, $criteria)
    {
        if (!class_exists($class_name)) {
            throw new Exception("Class $class_name not found");
        }
        return Storage::findFirst(self::class, $criteria);
    }

    public  static function create($class_name, $data = [])
    {
        if (!class_exists($class_name)) {
            throw new Exception("Class $class_name not found");
        }
        return Storage::create(self::class, $data);
    }

    public static function delete($entity)
    {
        Storage::delete($entity);
    }
    public static function save($entity)
    {
        $entity->get_storage()->save($entity);
    }



}
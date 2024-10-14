<?php

namespace App\Framework;

class Model extends ModelInterface
{

    protected $tablename;
    public function __construct()
    {
    }

    public static function getTableName(): string{
        return self::$tablename;
    }
    public static function findAll(array $criteria= null): array
    {
        return [];
    }

    public static function findOne($id): ModelInterface
    {
        $repo= Storage::getReporsitory(self::class);
        return $repo->find(self::class, $id);
    }
    public static function find(array $criteria): array
    {
        $repo= Storage::getReporsitory(self::class);
        return $repo->find(self::class, $criteria);

    }

    public static function update(Model $model):void
    {
        $repo= Storage::getReporsitory(self::class);
        return $repo->update(self::class, $criteria);
    }

    public static function create(Model $model):void
    {
        $repo= Storage::getReporsitory(self::class);
        return $repo->create(self::class);
    }

    public static function insert(Model $model):void
    {
        $repo= Storage::getReporsitory(self::class);
        return $repo->insert(self::class);
    }
    public static function create(Model $model):void
    {
        $repo= Storage::getReporsitory(self::class);
        return $repo->create(self::class);
    }

    public static function findOrCreate($id): ModelInterface
    {
        $repo= Storage::getReporsitory(self::class);
        return  $repo->find(self::class, $id)?? $repo->create(self::class);
    }



}
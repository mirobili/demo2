<?php

namespace App\Storage;

use App\Framework\DB;
use App\Framework\Repositories\MySqlRepository;

class Storage
{
//    public static function getReporsitory(string $model_class_name)
//    {
//        return new MySqlRepository();
//    }

    public static function findByID(string $model_class_name, $id): object
    {

        $table = $model_class_name::getTableName();
        $row = DB::getByID("SELECT * FROM $table where id =:id ", $id);

        $entity = $model_class_name::makeFromArray($row);

        return $entity;

    }

    public static function find(string $model_class_name, array $criteria): array
    {

        $table = $model_class_name::getTableName();

        if ($criteria) {
            foreach ($criteria as $key => $value) {
                $wher[] = " $key = :$key ";
            }

            $wher_str = implode(' and ', $wher);
            $qry = "SELECT * FROM $table where $wher_str ";
        } else {
            $qry = "SELECT * FROM $table";
        }

        $res = DB::query($qry, $criteria);
        $data = [];
        foreach ($res as $row) {

            $data[] = $model_class_name::makeFromArray($row);
        }
        return $data;
    }

    public static function save(\App\Framework\Entity $entity)
    {
        $table_name = $entity::class::$table_name;

        $id = $entity->getId();

        $toArray = $entity->toArray();

        unset($toArray['created_at']);
        unset($toArray['updated_at']);

        if ($entity->getId()) {
            $id = $entity->getId();
            self::update($table_name, $toArray, $id);
        } else {
            unset($toArray['id']);
            $id = self::insert($table_name, $toArray);
            return $id;
        }
    }

    private static function update($table_name, array $params, $id)
    {
        unset($params['created_at']);
        unset($params['updated_at']);
        $keys = array_keys($params);
        $query_params = [];
        foreach ($keys as $key) {
            $query_params [] = "$key  =  :$key  ";
        }

        $update_params_str = implode(",\n", $query_params);

        $qry = "update $table_name set 
                 $update_params_str
                where id = :id
                 ";

        DB::update($qry, $params, $id);
    }

    private static function insert($table_name, array $toArray): int
    {
        $params = array_keys($toArray);

        foreach ($params as $param) {

            $fields[] = "$param";
            $values[] = ":$param";
        }

        $fields_str = implode(",", $fields);
        $values_str = implode(",", $values);

        $qry = "insert into $table_name ($fields_str) values ($values_str)";

        foreach ($toArray as $key => $value) {
            $array[$key] = (string)$value;
        }

        $id = DB::insert($qry, $array);

        return $id;
    }
}
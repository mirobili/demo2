<?php

namespace App\Framework;

class ModelFactory
{
    public static function createModel(string $class, array $data)
    {
        $model = new $class;
        foreach ($data as $key => $value) {
            $model->$key = $value;
        }
        return $model;
    }
}
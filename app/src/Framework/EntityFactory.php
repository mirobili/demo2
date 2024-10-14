<?php

namespace App\Framework;

class EntityFactory {
    public static function create($tableName, $data = []) {
        $className = ucfirst($tableName);
        if (!class_exists($className)) {
            throw new Exception("Class $className not found!");
        }

        $entity = new $className();

        // Dynamically set properties using setters
        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst(str_replace('_', '', ucwords($key, '_')));
            if (method_exists($entity, $methodName)) {
                $entity->$methodName($value);
            }
        }

        return $entity;
    }
}
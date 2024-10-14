<?php

namespace App\Framework;

interface RepositoryInterface
{
    public function findAll(Model $model);

    public function find($model, $id);

    public function create(Model $model);

    public function update(Model $model);

    public function delete(Model $model);

    public function save($model);


}
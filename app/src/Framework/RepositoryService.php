<?php

namespace App\Framework;



class RepositoryService
{

    public function __construct(private RepositoryInterface $repository)
    {
    }

    public function find($model, $id): Model
    {

        return $this->repository->find($model, $id);
    }

    public function findAll($model)
    {

        return $this->repository->findAll($model);
    }

    public function save($model)
    {

        return $this->repository->save($model);
    }

    public function create($model)
    {

        return $this->repository->create($model);
    }

    public function update($model)
    {

        return $this->repository->update($model);
    }

    public function delete($model)
    {

        return $this->repository->delete($model);
    }
}
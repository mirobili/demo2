<?php

namespace App\Framework;

class Orm
{
    public function __construct(RepositoryBase $repository){}


    public function get($id){
        return $this->repository->find($id);
    }

    public function findAll(){
        return $this->repository->findAll();
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

    public function create($data){
        return $this->repository->create($data);
    }

    public function update($data){
        return $this->repository->update($data);
    }
    public function save($data){
        return $this->repository->save($data);
    }


}
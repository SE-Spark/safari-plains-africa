<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenericRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
    public function get()
    {
        return $this->model;
    }
    
    public function getItems(array $select = [],array $where = [])
    {
        $query = $this->model;
        
        if (!empty($where)) {
            $query->where($where);
        }
    
        if (!empty($select)) {
            return $query->get($select);
        }
    
        return $query->get();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $model = $this->model->create($data);
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update($id, array $data)
    {
        DB::beginTransaction();

        try {
            $model = $this->getById($id);
            $model->update($data);
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $model = $this->getById($id);
            $model->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    
}


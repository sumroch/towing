<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Store;

class StoreRepository
{
    protected $model;

    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    public function call()
    {
        $data   = $this->model->select('id', 'name')->pluck('name', 'id');

        return  $data;
    }
}

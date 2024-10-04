<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Towing;

class TowingRepository
{
    protected $model;

    public function __construct(Towing $model)
    {
        $this->model = $model;
    }

    public function call()
    {
        $data = $this->model->select('id', 'name')->pluck('name', 'id');
        return $data;
    }
}

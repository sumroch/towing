<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\CarColor;
use App\Traits\RepositoryTrait;
use Yajra\DataTables\DataTables;

class CarColorRepository
{
    use RepositoryTrait;
    protected $model;

    public function __construct(CarColor $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->select('id', 'name')
            ->orderBy('car_colors.created_at', 'desc')
            ->get();

        return DataTables::of($data)->toJson();
    }
}
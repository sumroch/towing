<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\CarCategory;
use App\Traits\RepositoryTrait;
use Yajra\DataTables\DataTables;

class CarCategoryRepository
{
    use RepositoryTrait;
    protected $model;

    public function __construct(CarCategory $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->select('id', 'name')
            ->orderBy('car_categories.created_at', 'desc')
            ->get();

        return DataTables::of($data)->toJson();
    }
}
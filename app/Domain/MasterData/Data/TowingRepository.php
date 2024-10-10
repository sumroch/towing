<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Towing;
use App\Traits\RepositoryTrait;
use Yajra\DataTables\DataTables;

class TowingRepository
{
    use RepositoryTrait;
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

    public function index()
    {
        $data = $this->model->select('id', 'name')
            ->orderBy('towing.created_at', 'desc')
            ->get();

        return DataTables::of($data)->toJson();
    }
}
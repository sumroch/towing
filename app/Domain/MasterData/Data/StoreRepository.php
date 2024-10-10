<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Store;
use App\Traits\RepositoryTrait;
use Yajra\DataTables\DataTables;

class StoreRepository
{
    use RepositoryTrait;
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

    public function index()
    {
        $data = $this->model->select('stores.id', 'stores.name', 'groups.id as group_name', 'groups.name as group_name')
            ->join('groups', 'groups.id', '=', 'stores.group_id')
            ->orderBy('stores.created_at', 'desc')
            ->get();

        return DataTables::of($data)->toJson();
    }
}
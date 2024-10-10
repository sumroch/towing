<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Group;
use App\Traits\RepositoryTrait;
use Yajra\DataTables\DataTables;

class GroupRepository
{
    use RepositoryTrait;
    protected $model;

    public function __construct(Group $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->select('id', 'name')
            ->orderBy('groups.created_at', 'desc')
            ->get();

        return DataTables::of($data)->toJson();
    }
}
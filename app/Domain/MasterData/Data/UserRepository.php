<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\User;
use Yajra\DataTables\DataTables;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function call()
    {
        $data = $this->model::whereHas('roles', function ($query) {
            $query->where('name', 'driver');
        })->select('id', 'name')->pluck('name', 'id');

        return $data;
    }

    public function index()
    {
        $data = $this->model->select('users.id', 'users.name', 'email', 'username', 'password', 'store_id', 'roles.name as role')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id');

        return DataTables::of($data)->toJson();
    }
}

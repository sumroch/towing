<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\User;
use App\Traits\RepositoryTrait;
use Yajra\DataTables\DataTables;

class UserRepository
{
    use RepositoryTrait;
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
        $data = $this->model->select('users.id', 'users.name', 'email', 'username', 'password', 'telephone', 'store_id', 'roles.name as role')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id');

        return DataTables::of($data)->toJson();
    }

    public function store($request)
    {
        $req = $request->only(['name', 'email', 'username', 'telephone', 'store_id']);

        if ($request->filled('password')) {
            $req['password'] = bcrypt($request->password);
        }

        return $this->model->create($req);
    }
}

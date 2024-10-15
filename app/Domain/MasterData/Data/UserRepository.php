<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\User;
use App\Traits\RepositoryTrait;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserRepository
{
    use RepositoryTrait;
    protected $model, $modelRole;

    public function __construct(User $model, Role $modelRole)
    {
        $this->model        = $model;
        $this->modelRole    = $modelRole;
    }

    public function role($request)
    {
        $data = $this->modelRole->when($request->user()->hasRole('manager'), function ($query) {
            $query->where('name', '!=', 'manager');
        })
            ->when($request->user()->hasRole('store'), function ($query) {
                $query->whereNotIn('name', ['manager', 'store']);
            })
            ->pluck('name');

        return $data;
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
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->orderBy('users.created_at', 'desc')
            ->get();

        return $data;
    }

    public function store($request)
    {
        $req = $request->only(['name', 'email', 'username', 'telephone', 'store_id']);

        if ($request->filled('password')) {
            $req['password'] = bcrypt($request->password);
        }

        return $this->model->create($req);
    }

    public function getUpdate($request, $id)
    {
        $data = $this->model->find($id);

        $data->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password'  => bcrypt($request->password ? $request->password : $data->password),
            'telephone' => $request->telephone,
            'store_id' => $request->store_id
        ]);

        return $data;
    }
}

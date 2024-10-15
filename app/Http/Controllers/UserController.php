<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Application\UserManagement;
use App\Domain\MasterData\Data\UserRepository;
use App\Domain\MasterData\Validators\UserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataDriver()
    {
        return $this->apiResponseSuccess($this->repository->call());
    }

    public function dataRole(Request $request)
    {
        $roles = Role::when($request->user()->hasRole('manager'), function ($query) {
            $query->where('name', '!=', 'manager');
        })
            ->when($request->user()->hasRole('store'), function ($query) {
                $query->whereNotIn('name', ['manager', 'store']);
            })
            ->pluck('name');

        return response()->json(['status' => 200, 'message' => "OKE", 'store' => $roles]);
    }

    public function index(Request $request)
    {
        return $this->repository->index($request);
    }

    public function store(UserRequest $request, UserManagement $userManagement)
    {
        $request->merge(['password', bcrypt($request->password)]);
        $user = $this->repository->store($request);
        $user->assignRole($request->role);

        return $this->apiResponseSuccess($user);
    }

    public function update(UserManagement $userManagement, UserRequest $request, $id)
    {
        $data = $userManagement->getUpdate($request, $id);
        $data->syncRoles(is_array($request->roles) ? $request->roles : [$request->roles]);

        return $this->apiResponseSuccess($data);
    }

    public function delete($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

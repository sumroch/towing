<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\UserRepository;
use App\Domain\MasterData\Validators\UserRequest;
use Illuminate\Http\Request;

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
        return $this->apiResponseSuccess($this->repository->role($request));
    }

    public function index(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->index($request));
    }

    public function store(UserRequest $request)
    {
        $request->merge(['password', bcrypt($request->password)]);
        $user = $this->repository->store($request);
        $user->assignRole($request->role);

        return $this->apiResponseSuccess($user);
    }

    public function update(Request $request, $id)
    {
        $data = $this->repository->getUpdate($request, $id);
        $data->syncRoles(is_array($request->role) ? $request->role : [$request->role]);

        return $this->apiResponseSuccess($data);
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

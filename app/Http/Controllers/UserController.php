<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Application\UserManagement;
use App\Domain\MasterData\Data\UserRepository;
use App\Domain\MasterData\Validators\UserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function dataDriver()
    {
        $driver = $this->userRepository->call();
        return response()->json(['status' => 200, 'message' => "OKE", 'store' => $driver]);
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
        $user = $this->userRepository->index($request);

        return $user;
    }

    public function store(UserRequest $request, UserManagement $userManagement)
    {
        $request->merge(['password', bcrypt($request->password)]);
        $user = $this->userRepository->store($request);
        $user->assignRole($request->role);

        return $this->apiResponseSuccess($user);
    }

    public function update(UserManagement $userManagement, UserRequest $request, $id)
    {
        $data = $userManagement->getUpdate($request, $id);
        $data->syncRoles(is_array($request->roles) ? $request->roles : [$request->roles]);

        return $this->apiResponseSuccess($data);
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->userRepository->delete($id));
    }
}

<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\UserRepository;
use App\Domain\MasterData\Entities\User;
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        $user = $this->userRepository->index($request);

        return $user;
    }

    public function store() {}

    public function update() {}

    public function destroy() {}
}

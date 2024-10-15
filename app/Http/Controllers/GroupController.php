<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\GroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $repository;

    public function __construct(GroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name')));
    }

    public function update(Request $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name')));
    }

    public function delete($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

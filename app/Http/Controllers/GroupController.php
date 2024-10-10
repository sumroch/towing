<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\GroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        $data = $this->groupRepository->index();
        return $data;
    }

    public function store(Request $request)
    {
        $data = $this->groupRepository->store($request->only('name'));
        return $this->apiResponseSuccess($data);
    }

    public function update(Request $request, $id)
    {
        $data = $this->groupRepository->update($id, $request->only('name'));
        return $this->apiResponseSuccess($data);
    }

    public function delete($id)
    {
        return $this->apiResponseSuccess($this->groupRepository->delete($id));
    }
}
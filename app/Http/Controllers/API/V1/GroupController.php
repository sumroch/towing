<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\MasterData\Data\GroupRepository;
use App\Domain\MasterData\Validators\GroupRequest;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    protected $repository;

    public function __construct(GroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataGroup()
    {
        return $this->apiResponseSuccess($this->repository->callDataGroup());
    }
    public function index()
    {
        return $this->repository->index();
    }

    public function store(GroupRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name')));
    }

    public function update(GroupRequest $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name')));
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

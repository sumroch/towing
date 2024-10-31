<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\MasterData\Data\StoreRepository;
use App\Domain\MasterData\Validators\StoreRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    protected $repository;

    public function __construct(StoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataStore()
    {
        return $this->apiResponseSuccess($this->repository->call());
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name', 'group_id')));
    }

    public function update(StoreRequest $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name', 'group_id')));
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

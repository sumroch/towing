<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\TowingRepository;
use App\Domain\MasterData\Validators\TowingRequest;

class TowingController extends Controller
{
    protected $repository;

    public function __construct(TowingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataTowing()
    {
        return $this->apiResponseSuccess($this->repository->call());
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(TowingRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name')));
    }

    public function update(TowingRequest $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name')));
    }

    public function delete($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

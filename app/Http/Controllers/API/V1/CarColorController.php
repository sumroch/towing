<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\MasterData\Data\CarColorRepository;
use App\Domain\MasterData\Validators\CarColorRequest;
use App\Http\Controllers\Controller;

class CarColorController extends Controller
{
    protected $repository;

    public function __construct(CarColorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataCarColor()
    {
        return $this->apiResponseSuccess($this->repository->list());
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(CarColorRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name')));
    }

    public function update(CarColorRequest $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name')));
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}
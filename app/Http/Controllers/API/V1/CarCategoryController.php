<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\MasterData\Data\CarCategoryRepository;
use App\Domain\MasterData\Validators\CarCategoryRequest;
use App\Http\Controllers\Controller;

class CarCategoryController extends Controller
{
    protected $repository;

    public function __construct(CarCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataCarCategory()
    {
        return $this->apiResponseSuccess($this->repository->list());
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(CarCategoryRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name')));
    }

    public function update(CarCategoryRequest $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name')));
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}
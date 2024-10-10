<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\StoreRepository;
use App\Domain\MasterData\Validators\StoreRequest;

class StoreController extends Controller
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function dataStore()
    {
        $store = $this->storeRepository->call();

        return response()->json(['status' => 200, 'message' => "OKE", 'store' => $store]);
    }

    public function index()
    {
        $store = $this->storeRepository->index();
        return $store;
    }

    public function store(StoreRequest $request)
    {
        $store = $this->storeRepository->store($request->only('name', 'group_id'));
        return $this->apiResponseSuccess($store);
    }

    public function update(StoreRequest $request, $id)
    {
        $store = $this->storeRepository->update($id, $request->only('name', 'group_id'));
        return $this->apiResponseSuccess($store);
    }

    public function delete($id)
    {
        return $this->apiResponseSuccess($this->storeRepository->delete($id));
    }
}
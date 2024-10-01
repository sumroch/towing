<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\StoreRepository;
use Illuminate\Http\Request;

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
}

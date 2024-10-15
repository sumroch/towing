<?php

namespace App\Http\Controllers;

use App\Domain\Order\Data\OrderRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->home($request));
    }

    public function calender(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->calender($request));
    }

    public function orderList($store_id)
    {
        return $this->repository->orderList($store_id);
    }

    public function orderListStore(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->orderListStore($request));
    }

    public function driverOrderList(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->driverOrderList($request));
    }

    public function storeHistory(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->storeHistory($request));
    }

    public function driverHistory(Request $request)
    {
        return $this->apiResponseSuccess($this->repository->driverHistory($request));
    }
}

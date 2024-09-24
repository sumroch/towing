<?php

namespace App\Http\Controllers;

use App\Domain\Order\Data\OrderRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function orderList($store_id)
    {
        return $this->apiResponseSuccess($this->orderRepository->orderList($store_id));
    }

    public function driverOrderList($driver_id)
    {
        return $this->apiResponseSuccess($this->orderRepository->driverOrderList($driver_id));
    }

    public function storeHistory($store_id, Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->storeHistory($store_id, $request));
    }

    public function driverHistory($driver_id, Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->driverHistory($driver_id, $request));
    }
}

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
    public function index(Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->home($request));
    }

    public function calender(Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->calender($request));
    }

    public function orderList($store_id)
    {
        return $this->orderRepository->orderList($store_id);
    }

    public function orderListStore(Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->orderListStore($request));
    }

    public function driverOrderList(Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->driverOrderList($request));
    }

    public function storeHistory(Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->storeHistory($request));
    }

    public function driverHistory(Request $request)
    {
        return $this->apiResponseSuccess($this->orderRepository->driverHistory($request));
    }
}

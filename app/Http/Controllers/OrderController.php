<?php

namespace App\Http\Controllers;

use App\Domain\Order\Application\OrderManagement;
use App\Domain\Order\Data\OrderRepository;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Validator\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $repository;
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(OrderRequest $Request, OrderManagement $orderManagement)
    {
        $order = Order::create($orderManagement->getData($Request));

        return $this->apiResponseSuccess($order);
    }

    public function update(OrderRequest $request, OrderManagement $orderManagement, $order_id)
    {
        $order = $orderManagement->getUpdate($request, $order_id);

        return $this->apiResponseSuccess($order);
    }

    public function updateConfirm(OrderRequest $request, OrderManagement $orderManagement, $order_id)
    {
        $order = $orderManagement->getUpdateConfirm($request, $order_id);

        return $this->apiResponseSuccess($order);
    }

    public function updateOrderDriver(OrderRequest $request, OrderManagement $orderManagement, $order_id)
    {
        $order = $orderManagement->getUpdateOrderDriver($request, $order_id);

        return $this->apiResponseSuccess($order);
    }
}

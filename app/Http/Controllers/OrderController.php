<?php

namespace App\Http\Controllers;

use App\Domain\Order\Application\OrderManagement;
use App\Domain\Order\Data\OrderRepository;
use App\Domain\Order\Validators\OrderRequest;

class OrderController extends Controller
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(OrderRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only(
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            'car_condition',
            'memo',
            'date',
            'time',
            'pic_1',
            'pic_2',
            'store_origin',
            'store_destination'
        )));
    }

    public function showOrderManager($order_id)
    {
        return $this->apiResponseSuccess($this->repository->getById($order_id));
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

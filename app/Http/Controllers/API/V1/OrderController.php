<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\Order\Data\OrderRepository;
use App\Domain\Order\Validators\OrderRequest;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
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

    public function showOrderStore($order_id)
    {
        return $this->apiResponseSuccess($this->repository->showOrderStore($order_id));
    }
    public function showOrderManager($order_id)
    {
        return $this->apiResponseSuccess($this->repository->showOrder($order_id));
    }

    public function update(OrderRequest $request, $order_id)
    {
        return $this->apiResponseSuccess($this->repository->getUpdate($request, $order_id));
    }

    public function updateConfirm(OrderRequest $request, $order_id)
    {
        return $this->apiResponseSuccess($this->repository->getUpdateConfirm($request, $order_id));
    }

    public function updateOrderDriver(OrderRequest $request, $order_id)
    {
        return $this->apiResponseSuccess($this->repository->getUpdateOrderDriver($request, $order_id));
    }

    public function destroy($order_id)
    {
        return $this->apiResponseSuccess($this->repository->delete($order_id));
    }
}

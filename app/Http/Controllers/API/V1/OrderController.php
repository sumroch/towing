<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\Order\Data\OrderRepository;
use App\Domain\Order\Validators\OrderRequest;
use App\Domain\Order\Validators\UpdateConfirmDriverOrderRequest;
use App\Domain\Order\Validators\UpdateConfirmOrderRequest;
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

    public function indexProgress()
    {
        return $this->repository->indexProgress();
    }

    public function store(OrderRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only(
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            // 'car_condition',
            'memo',
            'date',
            'time',
            'pic_1',
            'pic_2',
            'store_origin',
            'store_destination',
            'status'
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
        return $this->apiResponseSuccess($this->repository->update($order_id, $request->only([
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
            'store_destination',
            'date_confirm',
            'time_confirm',
            'towing_id',
            'driver_id',
        ])));
    }

    public function updateConfirm(UpdateConfirmOrderRequest $request, $order_id)
    {
        return $this->apiResponseSuccess($this->repository->update($order_id, $request->only([
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
            'store_destination',
            'date_confirm',
            'time_confirm',
            'towing_id',
            'driver_id',
            'status',
        ])));
    }

    public function updateOrderDriver(UpdateConfirmDriverOrderRequest $request, $order_id)
    {
        return $this->apiResponseSuccess($this->repository->update($order_id, $request->only([
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
            'store_destination',
            'date_confirm',
            'time_confirm',
            'towing_id',
            'driver_id',
            'status',
        ])));
    }

    public function destroy($order_id)
    {
        return $this->apiResponseSuccess($this->repository->delete($order_id));
    }
}

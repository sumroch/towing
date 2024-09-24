<?php

namespace App\Domain\Order\Data;

use App\Domain\Order\Entities\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function orderList($store_id)
    {
        return Order::select(
            'orders.id',
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            'car_condition',
            'memo',
            'date',
            'time',
            DB::raw('CONCAT(date, " ", time) as date'),
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->where('is_confirm', '0')
            ->where('store_origin.id', $store_id)
            ->orderBy('orders.created_at', 'desc')
            ->get();
    }

    public function driverOrderList($driver_id)
    {
        return Order::select(
            'orders.id',
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            'car_condition',
            'memo',
            'date',
            'time',
            DB::raw('CONCAT(date, " ", time) as date'),
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            "date_confirm",
            "time_confirm",
            "towing.name as towing",
            "is_confirm",
            "is_done",
            "driver_id",
            "drivers.name as driver_name",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('drivers', 'drivers.id', '=', 'orders.driver_id')
            ->where('is_confirm', '1')
            ->where('is_done', '0')
            ->where('driver_id', $driver_id)
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function storeHistory($store_id, $request)
    {
        return Order::select(
            'orders.id',
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            'car_condition',
            'memo',
            'date',
            'time',
            DB::raw('CONCAT(date, " ", time) as date'),
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            "date_confirm",
            "time_confirm",
            "towing.name as towing",
            "is_confirm",
            "is_done",
            "driver_id",
            "drivers.name as driver_name",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('drivers', 'drivers.id', '=', 'orders.driver_id')
            ->where('is_confirm', '1')
            ->where('is_done', '1')
            ->where('store_origin.id', $store_id)
            ->when($request->show == 'towing1', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            ->when($request->show == 'towing2', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            ->when($request->show == 'towing3', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            ->when($request->show == 'others', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            // ->when($request->user()->store_id, fn($x) => $x->where('store_origin', $request->user()->store_id))
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function driverHistory($driver_id, $request)
    {
        return Order::select(
            'orders.id',
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            'car_condition',
            'memo',
            'date',
            'time',
            DB::raw('CONCAT(date, " ", time) as date'),
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            "date_confirm",
            "time_confirm",
            "towing.name as towing",
            "is_confirm",
            "is_done",
            "driver_id",
            "drivers.name as driver_name",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('drivers', 'drivers.id', '=', 'orders.driver_id')
            ->where('is_confirm', '1')
            ->where('is_done', '1')
            ->where('driver_id', $driver_id)
            ->when($request->show == 'towing1', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            ->when($request->show == 'towing2', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            ->when($request->show == 'towing3', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            ->when($request->show == 'others', function ($query) use ($request) {
                return $query->where('towing', $request->show);
            })
            // ->when($request->user()->store_id, fn($x) => $x->where('store_origin', $request->user()->store_id))
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
}

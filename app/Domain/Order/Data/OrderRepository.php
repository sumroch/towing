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
            'store1.name as store_origin',
            'store2.name as store_destination',
            'is_confirm'
        )
            ->join('stores as store1', 'store1.id', '=', 'orders.store_origin')
            ->join('stores as store2', 'store2.id', '=', 'orders.store_destination')
            ->where('is_confirm', '0')
            ->where('store_origin.id', $store_id)
            ->get();
    }

    public function driverOrder($driver_id)
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
            'store_origin.name as store_1',
            'store2.name as store_2',
            "date_confirm",
            "time_confirm",
            "towing",
            "is_confirm",
            "is_done",
            "driver_id",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store2', 'store2.id', '=', 'orders.store_id_2')
            ->where('is_confirm', '1')
            ->where('is_done', '0')
            ->where('store_origin.id', $driver_id)
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
            'store_origin.name as store_1',
            'store2.name as store_2',
            "date_confirm",
            "time_confirm",
            "towing",
            "is_confirm",
            "is_done",
            "driver_id",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store2', 'store2.id', '=', 'orders.store_id_2')
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
            ->when($request->user()->store_id, fn($x) => $x->where('store_origin', $request->user()->store_id))
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
            'store_origin.name as store_1',
            'store2.name as store_2',
            "date_confirm",
            "time_confirm",
            "towing",
            "is_confirm",
            "is_done",
            "driver_id",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store2', 'store2.id', '=', 'orders.store_id_2')
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
            ->when($request->user()->store_id, fn($x) => $x->where('store_origin', $request->user()->store_id))
            ->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
}

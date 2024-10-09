<?php

namespace App\Domain\Order\Data;

use App\Domain\MasterData\Entities\Group;
use App\Domain\Order\Entities\Order;
use App\Traits\RepositoryTrait;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    use RepositoryTrait;
    protected $model, $modelGroup;

    public function __construct(Order $model, Group $modelGroup)
    {
        $this->model        = $model;
        $this->modelGroup   = $modelGroup;
    }

    public function home($request)
    {
        $group = $this->modelGroup::select('id', 'name')->with(['store'])->withCount('store as total_store')->get();
        return $group;
    }

    public function calender($request)
    {
        $disable_date = $this->model::select(
            DB::raw("DATE_FORMAT(date_confirm,'%Y-%m-%d') as date_confirm")
        )
            ->where('is_confirm', '1')
            ->pluck('date_confirm');

        $disable_date = $disable_date->unique();

        $store = $this->model::select(
            'id',
            'store_origin',
            'store_destination'
        )->where('is_confirm', '1')
            ->get();

        // return $disable_date;
        return compact('disable_date', 'store');
    }
    public function orderList($store_id)
    {
        $data = $this->model::select(
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
            ->where('store_origin', $store_id)
            ->orderBy('orders.created_at', 'desc')
            ->get();

        $name_store = $this->model::select(
            'store_origin.name as store',
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->where('store_origin', $store_id)
            ->first();

        $store = $name_store->store;
        $store_id = $store_id;

        return response()->json(['status' => 200, 'message' => "OKE", 'data' => $data, 'store' => $store, 'store_id' => $store_id]);
    }

    public function orderListStore($request)
    {
        return $this->model::select(
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
            'store_origin.id as store_origin_id',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->where('is_confirm', '0')
            ->where('store_origin', $request->store_id)
            ->orderBy('orders.created_at', 'desc')
            ->get();
    }

    public function driverOrderList($request)
    {
        return $this->model::select(
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
            "towing_id",
            "towing.name as towing",
            "is_confirm",
            "is_done",
            "driver_id",
            "users.name as driver_name",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where('is_confirm', '1')
            ->where('is_done', '0')
            ->when($request->user()->id, fn($x) => $x->where('driver_id', $request->user()->id))
            ->when($request->show == '1', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->when($request->show == '2', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->when($request->show == '3', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->when($request->show == '4', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function storeHistory($request)
    {
        return $this->model::select(
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
            "users.name as driver_name",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where('is_confirm', '1')
            ->where('is_done', '1')
            ->when($request->user()->hasRole('manager') && $request->store_id != 'null', function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('orders.store_origin', $request->filled('store_origin') ? $request->store_origin : $request->user()->store_id);
                });
            })
            ->when($request->user()->store_id, fn($x) => $x->where('store_origin', $request->user()->store_id))
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

            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function driverHistory($request)
    {
        return $this->model::select(
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
            "towing_id",
            "towing.name as towing",
            "is_confirm",
            "is_done",
            "driver_id",
            "users.name as driver_name",
            'is_confirm'
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where('is_confirm', '1')
            ->where('is_done', '1')
            ->when($request->user()->id, fn($x) => $x->where('driver_id', $request->user()->id))
            ->when($request->show == '1', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->when($request->show == '2', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->when($request->show == '3', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->when($request->show == '4', function ($query) use ($request) {
                return $query->where('towing_id', $request->show);
            })
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
}

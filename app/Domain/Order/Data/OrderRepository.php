<?php

namespace App\Domain\Order\Data;

use App\Domain\MasterData\Entities\Group;
use App\Domain\Order\Entities\Order;
use App\Traits\RepositoryTrait;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OrderRepository
{
    use RepositoryTrait;
    protected $model, $modelGroup;

    public function __construct(Order $model, Group $modelGroup)
    {
        $this->model        = $model;
        $this->modelGroup   = $modelGroup;
    }

    public function index()
    {
        $data = $this->model->select('orders.id', 'car_name', 'number_plate', 'number_body', 'car_color', 'car_category', 'memo', 'date', 'pic_1', 'pic_2', 'store_origin.name as store_origin', 'store_destination.name as store_destination', 'date_confirm', 'time_confirm', 'status')
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            // ->join('towing', 'towing.id', '=', 'orders.towing_id')
            // ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where(function ($query) {
                $query->where('status', 'done')
                    ->where('orders.finished_at', '>=', now()->addDays(-10));
            })
            ->orderBy('orders.created_at', 'desc');

        return DataTables::of($data)->toJson();
    }

    public function indexProgress()
    {
        $data = $this->model->select('orders.id', 'car_name', 'number_plate', 'number_body', 'car_color', 'car_category', 'memo', 'date', 'pic_1', 'pic_2', 'store_origin.name as store_origin', 'store_destination.name as store_destination', 'date_confirm', 'time_confirm', 'status')
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            // ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where('status', 'confirmed')
            ->orderBy('orders.created_at', 'desc');

        return DataTables::of($data)->toJson();
    }

    public function home($request)
    {
        return $this->modelGroup::select('id', 'name')->with(['store' => function ($query) {
            $query->withCount(['order as total_order' => function ($query) {
                $query->where('status', 'ready');
            }]);
        }])->withCount('store as total_store')->get();
    }

    public function calender($request)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            "status",
            'pic_2',
            'pic_1',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            DB::raw("DATE_FORMAT(date_confirm,'%Y-%m-%d') as date_confirm")
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            // ->join('towing', 'towing.id', '=', 'orders.towing_id')
            // ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where('status', 'confirmed')
            // ->when($request->show, function ($query) use ($request) {
            //     return $query->where('towing_id', $request->show);
            // })
            ->when($request->show == 'asc', function ($query) {
                return $query->orderBy('orders.created_at', 'asc');
            })
            ->orderBy('orders.created_at', 'desc')
            ->get();
    }
    public function orderList($store_id)
    {
        $data = $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            'status',
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->where('orders.store_origin', $store_id)
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->where('status', 'done')
                        ->where('orders.finished_at', '>=', now()->addDays(-2));
                })
                    ->orWhere('status', 'unready')
                    ->orWhere('status', 'ready')
                    ->orWhere('status', 'confirmed');
            })
            ->orderBy('orders.created_at', 'desc')
            ->orderBy('orders.updated_at', 'asc')
            ->get();

        $name_store = $this->model::select(
            'store_origin.name as store',
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->where('store_origin', $store_id)
            ->first();

        $store = $name_store->store;
        $store_id = $store_id;

        // return compact('data', 'store', 'store_id');
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
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->where('store_origin', $request->store_id)
            ->orderBy('orders.created_at', 'desc')
            ->get();
    }

    public function showOrderStore($order_id)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin',
            'store_destination',
            'date_confirm',
            'time_confirm',
            'status',
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            ->where('orders.id', $order_id)
            ->where(function ($query) {
                $query->where('status', 'unready')
                    ->orWhere('status', 'ready')
                    ->orWhere('status', 'confirmed');
            })
            ->first();
    }

    public function showOrder($order_id)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin',
            'store_destination',
            'date_confirm',
            'time_confirm',
            'status',
        )
            ->where('orders.id', $order_id)
            ->first();
    }

    public function driverOrderList($request)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            'date_confirm',
            'time_confirm',
            'status',
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            // ->join('towing', 'towing.id', '=', 'orders.towing_id')
            ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where('status', 'confirmed')
            ->when($request->user()->id, fn($x) => $x->where('driver_id', $request->user()->id))
            // ->when($request->show, function ($query) use ($request) {
            //     return $query->where('towing_id', $request->show);
            // })
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function showDriverOrder($order_id)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin',
            'store_destination',
            'date_confirm',
            'time_confirm',
            'status',
        )
            ->where('orders.id', $order_id)
            ->first();
    }

    public function storeHistory($request)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            'date_confirm',
            'time_confirm',
            'status',

        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            // ->join('towing', 'towing.id', '=', 'orders.towing_id')
            // ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where(function ($query) {
                $query->where('status', 'done')
                    ->where('orders.finished_at', '>=', now()->addDays(-10));
            })
            ->when(
                $request->user()->hasRole('マネジャー'),
                function ($query) use ($request) {
                    if ($request->store_id) {
                        $query->where('orders.store_origin', $request->store_id);
                    }
                },
                fn($query) => $query->where('orders.store_origin', $request->user()->store_id)
            )
            // ->when($request->show, function ($query) use ($request) {
            //     return $query->where('towing_id', $request->show);
            // })
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }

    public function driverHistory($request)
    {
        return $this->model::select(
            'orders.id',
            'car_name',
            'number_plate',
            'number_body',
            'car_color',
            'car_category',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin.name as store_origin',
            'store_destination.name as store_destination',
            'date_confirm',
            'time_confirm',
            'status',
        )
            ->join('stores as store_origin', 'store_origin.id', '=', 'orders.store_origin')
            ->join('stores as store_destination', 'store_destination.id', '=', 'orders.store_destination')
            // ->join('towing', 'towing.id', '=', 'orders.towing_id')
            // ->join('users', 'users.id', '=', 'orders.driver_id')
            ->where(function ($query) {
                $query->where('status', 'done')
                    ->where('orders.finished_at', '>=', now()->addDays(-10));
            })
            ->when($request->user()->id, fn($x) => $x->where('driver_id', $request->user()->id))
            // ->when($request->show, function ($query) use ($request) {
            //     return $query->where('towing_id', $request->show);
            // })
            ->orderBy('orders.updated_at', 'desc')
            ->get();
    }
}
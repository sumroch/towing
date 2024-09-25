<?php

namespace App\Domain\Order\Application;

use App\Domain\Order\Entities\Order;
use App\Domain\Order\Validator\OrderRequest;

class OrderManagement
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getData($request)
    {
        return [
            'car_name'      => $request->car_name,
            'number_plate'  => $request->number_plate,
            'car_color'     => $request->car_color,
            'car_category'  => $request->car_category,
            'car_condition' => $request->car_condition,
            'memo'          => $request->memo,
            'date'          => $request->date,
            'time'          => $request->time,
            'pic_1'         => $request->pic_1,
            'pic_2'         => $request->pic_2,
            'store_origin'  => $request->store_origin,
            'store_destination' => $request->store_destination,
        ];
    }

    public function getUpdate($request, $order_id)
    {
        $order = $this->model->findOrFail($order_id);

        $order->update([
            'car_name'      => $request->car_name,
            'number_plate'  => $request->number_plate,
            'car_color'     => $request->car_color,
            'car_category'  => $request->car_category,
            'car_condition' => $request->car_condition,
            'memo'          => $request->memo,
            'date'          => $request->date,
            'time'          => $request->time,
            'pic_1'         => $request->pic_1,
            'pic_2'         => $request->pic_2,
            'store_origin'  => $request->store_origin,
            'store_destination' => $request->store_destination,
        ]);

        return $order;
    }

    public function getUpdateConfirm($request, $order_id)
    {
        $order = $this->model->findOrFail($order_id);

        $order->update([
            'car_name'      => $request->car_name,
            'number_plate'  => $request->number_plate,
            'car_color'     => $request->car_color,
            'car_category'  => $request->car_category,
            'car_condition' => $request->car_condition,
            'memo'          => $request->memo,
            'date'          => $request->date,
            'time'          => $request->time,
            'pic_1'         => $request->pic_1,
            'pic_2'         => $request->pic_2,
            'store_origin'  => $request->store_origin,
            'store_destination' => $request->store_destination,
            'date_confirm'  => $request->date_confirm,
            'time_confirm'  => $request->time_confirm,
            'towing_id'     => $request->towing_id,
            'is_confirm'    => 1,
            'driver_id'     => $request->driver_id,
        ]);

        return $order;
    }

    public function getUpdateOrderDriver($request, $order_id)
    {
        $order = $this->model->findOrFail($order_id);

        $order->update([
            'car_name'      => $request->car_name,
            'number_plate'  => $request->number_plate,
            'car_color'     => $request->car_color,
            'car_category'  => $request->car_category,
            'car_condition' => $request->car_condition,
            'memo'          => $request->memo,
            'date'          => $request->date,
            'time'          => $request->time,
            'pic_1'         => $request->pic_1,
            'pic_2'         => $request->pic_2,
            'store_origin'  => $request->store_origin,
            'store_destination' => $request->store_destination,
            'date_confirm'  => $request->date_confirm,
            'time_confirm'  => $request->time_confirm,
            'towing_id'     => $request->towing_id,
            'is_confirm'    => 1,
            'is_done'       => 1,
            'driver_id'     => $request->driver_id
        ]);

        return $order;
    }
}

<?php

namespace Database\Seeders;

use App\Domain\Order\Entities\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Order::insert([
            [
                'car_name'      => 'Avanza',
                'number_plate'  => '熊谷 580 わ 1621',
                'car_color'         => 'ブラック系',
                'car_category'      => 'Rental',
                'car_condition'     => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'    => '2024/08/21',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => NULL,
                'time_confirm'  => NULL,
                'is_confirm'    => '0',
                'is_done'       => '0',
                'towing_id'     => NULL,
                'driver_id'     => NULL,
                'store_origin'    => '1',
                'store_destination'    => '3',
            ],
            [
                'car_name'      => 'Cayla',
                'number_plate'  => '熊谷 580 わ 1622',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Service',
                'car_condition' => 'mati',
                'memo'          => 'rangka mobilnya masih bagus',
                'date'          => '2024/08/19',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => NULL,
                'time_confirm'  => NULL,
                'is_confirm'    => '0',
                'is_done'       => '0',
                'towing_id'     => NULL,
                'driver_id'     => NULL,
                'store_origin'    => '2',
                'store_destination'    => '1',
            ],
            [
                'car_name'      => 'Xenia',
                'number_plate'  => '熊谷 580 わ 1623',
                'car_color'     => 'ブラック系',
                'car_category'  => 'New',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/19',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => NULL,
                'time_confirm'  => NULL,
                'is_confirm'    => '0',
                'is_done'       => '0',
                'towing_id'     => NULL,
                'driver_id'     => NULL,
                'store_origin'    => '3',
                'store_destination'    => '2',
            ],
            [
                'car_name'      => 'Sigra',
                'number_plate'  => '熊谷 580 わ 1624',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => NULL,
                'time_confirm'  => NULL,
                'is_confirm'    => '0',
                'is_done'       => '0',
                'towing_id'     => NULL,
                'driver_id'     => NULL,
                'store_origin'    => '3',
                'store_destination'    => '2',
            ],
            [
                'car_name'      => 'Rush',
                'number_plate'  => '熊谷 580 わ 1625',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Test',
                'pic_2'         => 'Anwar',
                'date_confirm'  => NULL,
                'time_confirm'  => NULL,
                'is_confirm'    => '0',
                'is_done'       => '0',
                'towing_id'     => NULL,
                'driver_id'     => NULL,
                'store_origin'    => '3',
                'store_destination'    => '2',
            ],

            //confirm
            [
                'car_name'      => 'Pajero',
                'number_plate'  => '熊谷 580 わ 1626',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Asep',
                'pic_2'         => 'Udin',
                'date_confirm'  => '2024/08/21',
                'time_confirm'  => '09:00 - 12:00',
                'is_confirm'    => '1',
                'is_done'       => '1',
                'towing_id'     => '1',
                'driver_id'     => '3',
                'store_origin'    => '1',
                'store_destination'    => '2'
            ],
            [
                'car_name'      => 'Agya',
                'number_plate'  => '熊谷 580 わ 1627',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => '2024/08/20',
                'time_confirm'  => '09:00 - 12:00',
                'is_confirm'    => '1',
                'is_done'       => '0',
                'towing_id'     => '1',
                'driver_id'     => '4',
                'store_origin'    => '2',
                'store_destination'    => '3',
            ],
            [
                'car_name'      => 'CRV',
                'number_plate'  => '熊谷 580 わ 1628',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => '2024/08/20',
                'time_confirm'  => '09:00 - 12:00',
                'is_confirm'    => '1',
                'is_done'       => '1',
                'towing_id'     => '1',
                'driver_id'     => '4',
                'store_origin'    => '4',
                'store_destination'    => '2',
            ],
            //done
            [
                'car_name'      => 'Hyundai',
                'number_plate'  => '熊谷 580 わ 1629',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => '2024/08/20',
                'time_confirm'  => '09:00 - 12:00',
                'is_confirm'    => '1',
                'is_done'       => '1',
                'towing_id'     => '1',
                'is_done'       => '1',
                'driver_id'     => '4',
                'store_origin'    => '1',
                'store_destination'    => '2',
            ],
            [
                'car_name'      => 'Carry',
                'number_plate'  => '熊谷 580 わ 1630',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => '2024/08/20',
                'time_confirm'  => '09:00 - 12:00',
                'is_confirm'    => '1',
                'is_done'       => '1',
                'towing_id'     => '1',
                'driver_id'     => '3',
                'store_origin'    => '3',
                'store_destination'    => '2',
            ],
            [
                'car_name'      => 'Honda Jazz',
                'number_plate'  => '熊谷 580 わ 1631',
                'car_color'     => 'ブラック系',
                'car_category'  => 'Second',
                'car_condition' => 'hidup',
                'memo'          => 'kondisi mobilnya masih bagus',
                'date'          => '2024/08/20',
                'time'          => '09:00 - 12:00',
                'pic_1'         => 'Andre',
                'pic_2'         => 'Anwar',
                'date_confirm'  => '2024/08/20',
                'time_confirm'  => '09:00 - 12:00',
                'is_confirm'    => '1',
                'is_done'       => '1',
                'towing_id'     => '3',
                'driver_id'     => '4',
                'store_origin'  => '5',
                'store_destination'    => '2',
            ],
        ]);
    }
}

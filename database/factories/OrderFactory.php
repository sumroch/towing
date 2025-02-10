<?php

namespace Database\Factories;

use App\Domain\Order\Entities\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition()
    {
        return [
            'car_name' => "order test",
            'number_plate' => "熊谷 580 わ 1723",
            'number_body' => "JAYKZE81SCJ154011",
            'car_color' => "ブラック系",
            'car_category' => "新車",
            'memo' => "kondisi mobilnya masih bagus",
            'date' => "2025/02/07",
            'pic_1' => "Andre",
            'pic_2' => "Anwar",
            'store_origin' => '1',
            'store_destination' => '1',
            'status' => "ready"
        ];
    }
}
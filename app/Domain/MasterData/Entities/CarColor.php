<?php

namespace App\Domain\MasterData\Entities;

use App\Domain\Order\Entities\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarColor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "car_colors";
    protected $fillable = [
        "name"
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
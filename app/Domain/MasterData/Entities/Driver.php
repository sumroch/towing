<?php

namespace App\Domain\MasterData\Entities;

use App\Domain\Order\Entities\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "drivers";
    protected $fillable =
    [
        "name",
        "telephone"
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'driver_id', 'id');
    }
}

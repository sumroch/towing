<?php

namespace App\Domain\MasterData\Entities;

use App\Domain\Order\Entities\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towing extends Model
{
    use HasFactory;
    protected $table = "towing";
    protected $fillable = [
        "name",
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'towing_id', 'id');
    }
}

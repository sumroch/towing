<?php

namespace App\Domain\MasterData\Entities;

use App\Domain\Order\Entities\Order;
use Database\Factories\TowingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Towing extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "towing";
    protected $fillable = [
        "name",
    ];

    protected static function newFactory()
    {
        return TowingFactory::new();
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'towing_id', 'id');
    }
}

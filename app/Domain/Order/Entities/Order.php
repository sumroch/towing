<?php

namespace App\Domain\Order\Entities;

use App\Domain\MasterData\Entities\Driver;
use App\Domain\MasterData\Entities\Store;
use App\Domain\MasterData\Entities\Towing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "car_name",
        "number_plate",
        "car_color",
        "car_category",
        "car_condition",
        "memo",
        "date",
        "time",
        "pic_1",
        "pic_2",
        "date_confirm",
        "time_confirm",
        "is_confirm",
        "is_done",
        "towing_id",
        "driver_id",
        "store_origin",
        "store_destination",
    ];

    public function towings()
    {
        return $this->belongsTo(Towing::class);
    }
    public function drivers()
    {
        return $this->belongsTo(Driver::class);
    }
    public function stores()
    {
        return $this->belongsTo(Store::class);
    }
}

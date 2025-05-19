<?php

namespace App\Domain\Order\Entities;

use App\Domain\MasterData\Entities\CarCategory;
use App\Domain\MasterData\Entities\CarColor;
use App\Domain\MasterData\Entities\Store;
use App\Domain\MasterData\Entities\Towing;
use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "orders";
    protected $fillable = [
        "car_name",
        "number_plate",
        "number_body",
        "car_color_id",
        "car_category_id",
        "car_condition",
        "memo",
        "date",
        "pic_1",
        "pic_2",
        "date_confirm",
        "time_confirm",
        "status",
        "user_id",
        "towing_id",
        "driver_id",
        "store_origin",
        "other",
        "store_destination",
        "finished_at",
    ];

    public function towings()
    {
        return $this->belongsTo(Towing::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function stores()
    {
        return $this->belongsTo(Store::class);
    }

    public function car_categories()
    {
        return $this->belongsTo(CarCategory::class);
    }

    public function car_colors()
    {
        return $this->belongsTo(CarColor::class);
    }
}
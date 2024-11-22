<?php

namespace App\Domain\Order\Entities;

use App\Domain\MasterData\Entities\Store;
use App\Domain\MasterData\Entities\Towing;
use App\Domain\MasterData\Entities\User;
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
        "status",
        "towing_id",
        "driver_id",
        "store_origin",
        "store_destination",
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

    public function remove_done()
    {
        $data = Order::all();
        foreach ($data as $item) {
            if ($item->status == 'done') {
                $updated = strtotime($item->updated_at) + (180 * 1);
                if ($updated < time()) {
                    $item->delete();
                }
            }
        }

        // Order::where('status', 'done')
        //     ->where('updated_at', '<', now()->subMinutes(180))
        //     ->delete();
    }
}
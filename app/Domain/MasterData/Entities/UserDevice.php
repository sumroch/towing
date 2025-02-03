<?php

namespace App\Domain\MasterData\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "user_devices";
    protected $fillable = [
        "user_id",
        "fcm_token",
        "is_signed_in",
        "signed_in_at",
        "signed_out_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

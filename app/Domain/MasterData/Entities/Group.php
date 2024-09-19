<?php

namespace App\Domain\MasterData\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = "groups";
    protected $fillable = [
        "name"
    ];

    public function store()
    {
        return $this->hasOne(Store::class, 'group_id', 'id');
    }
}

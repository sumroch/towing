<?php

namespace App\Domain\MasterData\Entities;

use Database\Factories\GroupFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "groups";
    protected $fillable = [
        "name"
    ];

    public static function newFactory()
    {
        return GroupFactory::new();
    }

    public function store()
    {
        return $this->hasMany(Store::class);
    }
}

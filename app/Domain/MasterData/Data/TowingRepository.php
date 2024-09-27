<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Towing;
use Illuminate\Support\Facades\DB;

class TowingRepository
{
    protected $model;

    public function __construct(Towing $model)
    {
        $this->model = $model;
    }
}

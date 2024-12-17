<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Towing;
use App\Traits\RepositoryTrait;

class TowingRepository
{
    use RepositoryTrait;
    protected $model;

    public function __construct(Towing $model)
    {
        $this->model = $model;
    }
}

<?php

namespace App\Domain\MasterData\Data;

use App\Domain\MasterData\Entities\Group;

class GroupRepository
{
    protected $model;

    public function __construct(Group $model)
    {
        $this->model = $model;
    }
}

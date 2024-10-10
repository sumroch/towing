<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\GroupRepository;
use App\Domain\MasterData\Entities\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }
}
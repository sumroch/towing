<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\TowingRepository;
use Illuminate\Http\Request;

class TowingController extends Controller
{
    protected $towingRepository;

    public function __construct(TowingRepository $towingRepository)
    {
        $this->towingRepository = $towingRepository;
    }

    public function dataTowing()
    {
        $towing = $this->towingRepository->call();

        return response()->json(['status' => 200, 'message' => "OKE", 'towing' => $towing]);
    }
}

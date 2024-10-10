<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Data\TowingRepository;
use App\Domain\MasterData\Entities\Towing;
use App\Domain\MasterData\Validators\TowingRequest;

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

    public function index()
    {
        $towing = $this->towingRepository->index();
        return $towing;
    }

    public function store(TowingRequest $request)
    {
        $towing = $this->towingRepository->store($request->only('name'));

        return $this->apiResponseSuccess($towing);
    }

    public function update(TowingRequest $request, $id)
    {
        $towing = $this->towingRepository->update($id, $request->only('name'));
        return $this->apiResponseSuccess($towing);
    }

    public function delete($id)
    {
        return $this->apiResponseSuccess($this->towingRepository->delete($id));
    }
}
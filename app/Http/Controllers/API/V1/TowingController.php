<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\MasterData\Data\TowingRepository;
use App\Domain\MasterData\Validators\TowingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TowingController extends Controller
{
    protected $repository;

    public function __construct(TowingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataTowing()
    {
        return $this->apiResponseSuccess($this->repository->list());
    }

    public function index(Request $request)
    {
        return $this->repository->call($request);
    }

    public function store(TowingRequest $request)
    {
        return $this->apiResponseSuccess($this->repository->store($request->only('name')));
    }

    public function update(TowingRequest $request, $id)
    {
        return $this->apiResponseSuccess($this->repository->update($id, $request->only('name')));
    }

    public function destroy($id)
    {
        return $this->apiResponseSuccess($this->repository->delete($id));
    }
}

<?php

namespace App\Http\Controllers;

use App\Domain\Order\Application\OrderManagement;
use App\Domain\Order\Data\OrderRepository;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Validator\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $repository;
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(OrderRequest $Request, OrderManagement $orderManagement)
    {
        $order = Order::create($orderManagement->getData($Request));

        return $this->apiResponseSuccess($order);
    }
}

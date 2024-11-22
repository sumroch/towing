<?php

namespace App\Order\Jobs;

use App\Domain\Order\Entities\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveDoneOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $expired_at = now()->addDays(-10);
        Order::where('status', 'done')
            ->where('updated_at', '<=', $expired_at)
            ->chunk(1000, function ($orders) {
                foreach ($orders as $order) {
                    $order->delete();
                }
            });
    }
}
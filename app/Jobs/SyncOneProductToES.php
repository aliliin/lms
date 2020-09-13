<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncOneProductToES implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $product;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 使用异步队列同步到 es 数据中
        $data = $this->product->toESArray();
        app('es')->index([
            'index' => 'products',
            'type' => '_doc',
            'id' => $data['id'],
            'body' => $data,
        ]);
    }
}

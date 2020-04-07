<?php

namespace App\Listeners;

use App\Events\OrderReviewd;
use App\Models\OrderItem;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductRating
{

    /**
     * Handle the event.
     *
     * @param OrderReviewd $event
     *
     * @return void
     */
    public function handle(OrderReviewd $event)
    {
        $items = $event->getOrder()->items()->with(['product'])->get();

        foreach ($items as $item) {
            $result = OrderItem::query()
                ->where(['product_id', $item->product_id])
                ->whereHas('order', function ($query) {
                    $query->whereNotNull('paid_at');
                })
                ->first([
                    DB::raw('count(*) as review_count'),
                    DB::raw('avg(rating) as review_rating'),
                ]);

            $item->product->update([
                'rating' => $result->review_rating,
                'review_count' => $result->review_count,
            ]);
        }
    }
}

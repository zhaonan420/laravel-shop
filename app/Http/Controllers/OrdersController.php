<?php

namespace App\Http\Controllers;

use App\Events\OrderReviewd;
use App\Exceptions\InvalidRequestException;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\SendReviewRequest;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }


    public function index(Request $request)
    {
        $orders = Order::query()->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }


    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);

        return view('orders.show', [
            'order' => $order->load(['items.product', 'items.productSku']),
        ]);
    }


    public function received(Order $order, Request $request)
    {
        $this->authorize('own', $order);

        if ($order->ship_status != Order::SHIP_STATUS_DELIVERED) {
            throw new InvalidRequestException('商品未发货');
        }

        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        return redirect()->back();
    }


    public function review(Order $order)
    {
        $this->authorize('own', $order);

        if (! $order->paid_at) {
            throw new InvalidRequestException('订单未支付, 不能评价');
        }

        return view('orders.review', ['order' => $order->load(['items.product', 'items.productSku'])]);
    }


    public function sendReview(Order $order, SendReviewRequest $request)
    {
        $this->authorize('own', $order);

        if (! $order->paid_at) {
            throw new InvalidRequestException('订单未支付, 不能评价');
        }

        // 判断是否已经评价
        if ($order->reviewed) {
            throw new InvalidRequestException('该订单已评价，不可重复提交');
        }

        $reviews = $request->input('reviews');
        \DB::transaction(function () use ($reviews, $order) {
            foreach ($reviews as $item) {
                $orderItem = $order->items()->find($item['id']);
                $orderItem->update([
                    'rating' => $item['rating'],
                    'review' => $item['review'],
                    'reviewed_at' => Carbon::now(),
                ]);

                $order->update(['reviewed' => true]);
            }

            event(new OrderReviewd($order));
        });

        return redirect()->back();
    }
}

<?php

namespace App\Admin\Controllers;

use App\Exceptions\InternalException;
use App\Exceptions\InvalidRequestException;
use App\Http\Requests\Admin\HandleRefundRequest;
use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class OrdersController extends AdminController
{
    use ValidatesRequests;


    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->model()->orderBy('paid_at', 'desc');

        $grid->column('no', '订单流水号');
        $grid->column('user.name', '买家');
        $grid->column('total_amount', '总金额')->sortable();
        $grid->column('paid_at', '支付时间')->sortable();
        $grid->column('ship_status', '物流')->display(function ($value) {
            return Order::$shipStatusMap[$value];
        });
        $grid->column('refund_status', '退款状态')->display(function ($value) {
            return Order::$refundStatusMap[$value];
        });

        $grid->disableCreateButton();
        //$grid->disableActions();
        $grid->disableBatchActions();

        $grid->actions(function ($actions) {
            // 禁用删除和编辑按钮
            $actions->disableDelete();
            $actions->disableEdit();
        });


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('no', __('No'));
        $show->field('user_id', __('User id'));
        $show->field('address', __('Address'));
        $show->field('total_amount', __('Total amount'));
        $show->field('remark', __('Remark'));
        $show->field('paid_at', __('Paid at'));
        $show->field('payment_method', __('Payment method'));
        $show->field('payment_no', __('Payment no'));
        $show->field('refund_status', __('Refund status'));
        $show->field('refund_no', __('Refund no'));
        $show->field('closed', __('Closed'));
        $show->field('reviewed', __('Reviewed'));
        $show->field('ship_status', __('Ship status'));
        $show->field('ship_data', __('Ship data'));
        $show->field('extra', __('Extra'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->text('no', __('No'));
        $form->number('user_id', __('User id'));
        $form->textarea('address', __('Address'));
        $form->decimal('total_amount', __('Total amount'));
        $form->textarea('remark', __('Remark'));
        $form->datetime('paid_at', __('Paid at'))->default(date('Y-m-d H:i:s'));
        $form->text('payment_method', __('Payment method'));
        $form->text('payment_no', __('Payment no'));
        $form->text('refund_status', __('Refund status'))->default('pending');
        $form->text('refund_no', __('Refund no'));
        $form->switch('closed', __('Closed'));
        $form->switch('reviewed', __('Reviewed'));
        $form->text('ship_status', __('Ship status'))->default('pending');
        $form->textarea('ship_data', __('Ship data'));
        $form->textarea('extra', __('Extra'));

        return $form;
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('查看订单')
            ->body(view('admin.orders.show', ['order' => Order::find($id)]));
    }


    public function ship(Order $order, Request $request)
    {
        // 判断当前订单是否已支付
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未付款');
        }
        // 判断当前订单发货状态是否为未发货
        if ($order->ship_status !== Order::SHIP_STATUS_PENDING) {
            throw new InvalidRequestException('该订单已发货');
        }
        // Laravel 5.5 之后 validate 方法可以返回校验过的值
        $data = $this->validate($request, [
            'express_company' => ['required'],
            'express_no' => ['required'],
        ], [], [
            'express_company' => '物流公司',
            'express_no' => '物流单号',
        ]);
        // 将订单发货状态改为已发货，并存入物流信息
        $order->update([
            'ship_status' => Order::SHIP_STATUS_DELIVERED,
            // 我们在 Order 模型的 $casts 属性里指明了 ship_data 是一个数组
            // 因此这里可以直接把数组传过去
            'ship_data' => $data,
        ]);

        // 返回上一页
        return redirect()->back();
    }


    public function handleRefund(Order $order, HandleRefundRequest $request)
    {
        // 判断订单状态是否正确
        if ($order->refund_status !== Order::REFUND_STATUS_APPLIED) {
            throw new InvalidRequestException('订单状态不正确');
        }
        // 是否同意退款
        if ($request->input('agree')) {
            // 同意退款的逻辑这里先留空
            $this->_refundOrder($order);
        } else {
            // 将拒绝退款理由放到订单的 extra 字段中
            $extra = $order->extra ?: [];
            $extra['refund_disagree_reason'] = $request->input('reason');
            // 将订单的退款状态改为未退款
            $order->update([
                'refund_status' => Order::REFUND_STATUS_PENDING,
                'extra' => $extra,
            ]);
        }

        return $order;
    }

    protected function _refundOrder(Order $order)
    {
        if ($order->payment_method == 'alipay') {
            $refundNo = Order::getAvailableRefundNo();

            $ret = app('alipay')->refund([
                'out_trade_no' => $order->no,
                'out_request_no' => $refundNo,
                'refund_amount' => $order->total_amount,
            ]);

            if ($ret->sub_code) {
                $extra = $order->extra;
                $extra['refund_failed_code'] = $order->sub_code;
                $order->update([
                    'refund_no' => $refundNo,
                    'refund_status' => Order::REFUND_STATUS_FAILED,
                    'extra' => $extra,
                ]);
            } else {
                $order->update([
                    'refund_no' => $refundNo,
                    'refund_status' => Order::REFUND_STATUS_SUCCESS,
                ]);
            }
        } else {
            throw new InternalException('未知订单支付方式：' . $order->payment_method);
        }
    }
}

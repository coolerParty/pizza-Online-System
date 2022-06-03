<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminOrderComponent extends Component
{
    // comment here sample

    public function updateOrderStatus($order_id, $status)
    {
        if (!auth()->user()->can('order-show', 'order-edit','admin-access')) {
            abort(404);
        }

        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order status has been updated successfully to '. $status . '!');
        return redirect()->to(route('admin.order'));
    }

    public function render()
    {
        if (!auth()->user()->can('order-show', 'admin-access')) {
            abort(404);
        }

        $orders = Order::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.dashboard');
    }
}

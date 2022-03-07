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
        $orders = Order::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.dashboard');
    }
}

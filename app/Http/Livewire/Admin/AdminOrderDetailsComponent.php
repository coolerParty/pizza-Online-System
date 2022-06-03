<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        if (!auth()->user()->can('order-show', 'admin-access')) {
            abort(404);
        }

        $order      = Order::where('id', $this->order_id)->first();
        $orderItems = OrderItem::where('order_id',$order->id)->get();
        return view('livewire.admin.admin-order-details-component',['order'=>$order,'orderItems'=>$orderItems])->layout('layouts.dashboard');
    }
}

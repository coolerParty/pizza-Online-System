<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function cancelOrder()
    {
        $order = Order::where('id',$this->order_id)->where('user_id',Auth::user()->id)->first();
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message','Order has been canceled successfully!');
        return redirect()->to(route('user.orderdetail',['order_id'=>$this->order_id]));
    }

    public function render()
    {
        $order      = Order::where('id', $this->order_id)->where('user_id',Auth::user()->id)->first();
        $orderItems = OrderItem::where('order_id',$order->id)->get();
        return view('livewire.user.user-order-details-component',['order'=>$order,'orderItems'=>$orderItems])->layout('layouts.dashboard');
    }
}

<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->where('status', 'ordered')->orderBy('created_at','DESC')->get();
        $prevOrders = Order::where('user_id',Auth::user()->id)->where('status', '<>', 'ordered')->orderBy('created_at','DESC')->paginate(10);

        return view('livewire.user.user-order-component',['orders'=>$orders, 'prevOrders'=>$prevOrders])->layout('layouts.base');
    }
}

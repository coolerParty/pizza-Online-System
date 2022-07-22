<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminDashboardComponent extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('admin-access');

        $orders = Order::select('id', 'status')->where('status', '<>', 'canceled')->get();
        $orderTotal = $orders->count();
        $orderDelivered = $orders->where('status', 'delivered')->count();
        $userTotal = User::count();

        $date = now();
        $recentOrders = Order::select('id', 'status', 'created_at', 'user_id', 'total')->whereMonth('created_at', '=', $date->month)->whereYear('created_at', '=', $date->year)->orderBy('created_at', 'DESC')->take(10)->get();

        $recentReviews = Review::select('id', 'comment', 'created_at', 'order_item_id', 'rating')->whereMonth('created_at', '=', $date->month)->whereYear('created_at', '=', $date->year)->orderBy('created_at', 'DESC')->take(10)->get();

        $productStocks = Product::select('id', 'name', 'quantity', 'regulary_price', 'image', 'stock_status')->where('quantity', '<=', 15)->orderBy('quantity','ASC')->get();

        return view(
            'livewire.admin.admin-dashboard-component',
            [
                'orderTotal' => $orderTotal,
                'orderDelivered' => $orderDelivered,
                'userTotal' => $userTotal,
                'recentOrders' => $recentOrders,
                'recentReviews' => $recentReviews,
                'productStocks' => $productStocks,
            ]
        )->layout('layouts.dashboard');
    }
}

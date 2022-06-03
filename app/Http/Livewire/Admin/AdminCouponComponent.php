<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponComponent extends Component
{
    public function deleteCoupon($coupon_id)
    {
        if (!auth()->user()->can('coupon-show','coupon-delete', 'admin-access')) {
            abort(404);
        }

        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('del_message','Coupon has been deleted successfully');
        return redirect()->to(route('admin.coupon'));
    }

    public function render()
    {
        if (!auth()->user()->can('coupon-show', 'admin-access')) {
            abort(404);
        }

        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupon-component',['coupons'=>$coupons])->layout('layouts.dashboard');
    }
}

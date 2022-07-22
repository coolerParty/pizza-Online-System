<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCouponComponent extends Component
{
    use AuthorizesRequests;

    public function deleteCoupon($coupon_id)
    {
        $this->authorize('coupon-show', 'coupon-delete', 'admin-access');

        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('del_message','Coupon has been deleted successfully');
        return redirect()->to(route('admin.coupon'));
    }

    public function render()
    {
        $this->authorize('coupon-show', 'admin-access');

        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupon-component',['coupons'=>$coupons])->layout('layouts.dashboard');
    }
}

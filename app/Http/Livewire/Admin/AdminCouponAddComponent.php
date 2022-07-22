<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCouponAddComponent extends Component
{
    use AuthorizesRequests;
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code'       => 'required|unique:coupons',
            'type'       => 'required',
            'value'      => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required',
        ]);
    }

    public function addCoupon()
    {
        $this->authorize('coupon-create', 'admin-access');

        $this->validate([
            'code'       => 'required|unique:coupons',
            'type'       => 'required',
            'value'      => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required',
       ]);

        $coupon             = new Coupon();
        $coupon->code       = $this->code;
        $coupon->type       = $this->type;
        $coupon->value      = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message',$this->code . ' coupon has been added successfully!');
    }

    public function render()
    {
        $this->authorize('coupon-create', 'admin-access');

        return view('livewire.admin.admin-coupon-add-component')->layout('layouts.dashboard');
    }
}

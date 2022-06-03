<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Validation\Rule;

class AdminCouponEditComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function mount($coupon_id)
    {
        $coupon = Coupon::where('id',$coupon_id)->first();
        if($coupon)
        {
            $this->coupon_id   = $coupon->id;
            $this->code        = $coupon->code;
            $this->type        = $coupon->type;
            $this->value       = $coupon->value;
            $this->cart_value  = $coupon->cart_value;
            $this->expiry_date = $coupon->expiry_date;
        }
        else
        {
            session()->flash('message','No coupon has been found!');
            return redirect()->to(route('admin.coupon'));
        }

    }

    public function updated($fields)
    {

        $this->validateOnly($fields,[
            'code'        => ['required', Rule::unique('coupons')->ignore($this->coupon_id)],
            'type'        => 'required',
            'value'       => 'required|numeric',
            'cart_value'  => 'required|numeric',
            'expiry_date' => 'required',
        ]);

    }

    public function updateCoupon()
    {
        if (!auth()->user()->can('coupon-edit', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'code'        => ['required', Rule::unique('coupons')->ignore($this->coupon_id)],
            'type'        => 'required',
            'value'       => 'required|numeric',
            'cart_value'  => 'required|numeric',
            'expiry_date' => 'required',
        ]);

        $coupon              = Coupon::where('id',$this->coupon_id)->first();
        $coupon->code        = $this->code;
        $coupon->type        = $this->type;
        $coupon->value       = $this->value;
        $coupon->cart_value  = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message',$this->code . ' coupon has been Updated Successfully!');

    }

    public function render()
    {
        if (!auth()->user()->can('coupon-edit', 'admin-access')) {
            abort(404);
        }
        return view('livewire.admin.admin-coupon-edit-component')->layout('layouts.dashboard');
    }
}

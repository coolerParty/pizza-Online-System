<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserReviewEditComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;
    public $order_id;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
        $review = Review::where('order_item_id',$order_item_id)->first();
        $this->rating = $review->rating;
        $this->comment = $review->comment;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }

    public function editReview()
    {
        $this->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $order = Order::select('user_id')->where('id',$this->order_id)->first();
        if(!$order && Auth::user()->id != $order->user_id)
        {
            abort(404);
        }

        $review = Review::where('order_item_id',$this->order_item_id)->first();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->save();

        session()->flash('message','Your review has been updated successfully!');
        return redirect()->to(route('user.orderdetail', ['order_id'=>$this->order_id]));
    }

    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        $order = Order::select('id','user_id')->where('id', $orderItem->order_id)->first();
        if(!$order && Auth::user()->id != $order->user_id)
        {
            abort(404);
        }
        $this->order_id = $order->id;

        return view('livewire.user.user-review-edit-component',['orderItem'=>$orderItem])->layout('layouts.base');
    }
}

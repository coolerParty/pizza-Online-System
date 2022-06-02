<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $table = "home_sliders";

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}

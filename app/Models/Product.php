<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'quantity', 'photo', 'description', 'category_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function orderlists() {
        return $this->hasMany(Orderlist::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime', 'user_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orderlists() {
        return $this->hasMany(Orderlist::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

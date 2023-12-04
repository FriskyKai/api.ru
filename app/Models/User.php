<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname', 'name', 'patronymic', 'sex', 'birth', 'login', 'password', 'email'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

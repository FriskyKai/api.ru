<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends \Illuminate\Foundation\Auth\User
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

    public function generateToken() {
        $this->api_token = Hash::make(Str::random());
        $this->save();
        return $this->api_token;
    }
}

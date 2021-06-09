<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id', 'product_id', 'name', 'email', 'phone', 'address'];

    // * Relation ship
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}

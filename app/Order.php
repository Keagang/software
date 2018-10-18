<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table= 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps=false;

    protected $fillable = ['order_id', 'username', 'email', 'pid', 'pname', 'price', 'quantity', 'total', 'address', 'date'];
}

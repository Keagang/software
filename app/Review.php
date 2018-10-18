<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table= 'reviews';
    protected $primaryKey = 'rid';
    public $timestamps=false;
    
    protected $fillable = ['rid', 'pid', 'pname', 'username', 'email', 'review', 'ip', 'stars'];
}

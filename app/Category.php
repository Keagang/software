<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= 'category';
    protected $primaryKey = 'id';
    public $timestamps=false;

    protected $fillable = ['cid','cname'];
}
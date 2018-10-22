<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewcount extends Model
{
    protected $table= 'reviewcount';
    protected $fillable=['pname','username', 'ip', 'review', 'stars', 'count', 'status', 'created_at', "updated_at"];

}

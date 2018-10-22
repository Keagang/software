<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $table= 'blacklist';
    // protected $primaryKey =null;
    protected $fillable=['ip_addresses','countries','cities'];
}

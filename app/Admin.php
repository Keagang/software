<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table= 'admin';
    protected $primaryKey = 'aid';
    public $timestamps=false;

    protected $fillable = ['aid','username','password'];
}

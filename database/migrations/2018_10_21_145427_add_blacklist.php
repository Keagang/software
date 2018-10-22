<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlacklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blacklist')) {
         Schema::create('blacklist', function (Blueprint $t) {
            $t->increments('id');
            $t->string('ip_addresses')->nullable();
            $t->string('countries')->nullable();
            $t->string('cities')->nullable();
        });   
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blacklist');
    }
}

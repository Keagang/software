<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReviewcount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reviewcount')) {
         Schema::create('reviewcount', function (Blueprint $t) {
            $t->string('user_name');
            $t->foreign('user_name')->references('username')->on('reviews')->onDelete('cascade');
            $t->string('ip');
            $t->foreign('ip')->references('ip')->on('reviews')->onDelete('cascade');
            $t->string('review');
            $t->foreign('review')->references('review')->on('reviews')->onDelete('cascade');
            $t->string('stars');
            $t->foreign('stars')->references('stars')->on('reviews')->onDelete('cascade');
            $t->unsignedInteger('count')->nullable();
            $t->string('status')->nullable();
            $t->timestamps();
            defaultStringLength(250);
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
        Schema::table('reviewcount',function (Blueprint $t){
            $t->dropForeign('user_name');
            $t->dropForeign('ip');
            $t->dropForeign('review');
            $t->dropForeign('stars');
        });
        Schema::dropIfExists('reviewcount');
    }
}

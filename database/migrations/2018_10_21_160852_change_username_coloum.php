<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsernameColoum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('reviewcount', function (Blueprint $table) {
    $table->renameColumn('user_name', 'username');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviewcount', function (Blueprint $table) {
    $table->renameColumn( 'username','user_name');
      });
    }
}

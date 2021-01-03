<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_logs', function (Blueprint $table) {
        $table->increments('id');
        $table->string('user_id', 20);
        $table->string('user_ip', 20);
        $table->string('browser', 20);
        $table->string('device_name', 20);
        $table->string('os', 20);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

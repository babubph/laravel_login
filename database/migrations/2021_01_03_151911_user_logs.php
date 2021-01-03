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
          $table->string('user_ip', 20)->unique();
          $table->string('browser', 20);
          $table->string('browser_version', 20);
          $table->string('os', 20);
          $table->string('date_time', 20);
          $table->timestamp('email_verified_at')->nullable();
          $table->rememberToken();
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

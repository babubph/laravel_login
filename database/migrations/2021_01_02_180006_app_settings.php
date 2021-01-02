<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('app_settings', function (Blueprint $table) {
          $table->increments('id');
          $table->string('app_title');
          $table->string('email')->unique();
          $table->string('contact');
          $table->longText('address');
          $table->longText('meta_dis');
          $table->longText('meta_keyword');
          $table->string('logo_img');
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

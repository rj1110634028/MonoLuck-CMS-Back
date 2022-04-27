<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission')->default(5);
            $table->string('name',40);
            $table->string('password',64);
            $table->string('cardId',20)->unique()->nullable();
            $table->string('phone',10)->unique()->nullable();
            $table->string('email',80)->unique();
            $table->dateTime('token_expire_time')->nullable();
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
        Schema::dropIfExists('users');
    }
};

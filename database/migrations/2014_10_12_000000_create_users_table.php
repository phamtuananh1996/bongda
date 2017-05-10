<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('provider',50)->nullable();
            $table->string('provider_id',50)->nullable();
            $table->string('avatar',200)->default("assets/dayday/img/Friends/guy-3.jpg");
            $table->string('phone',12)->nullable();
            $table->date('birthday')->nullable();
            $table->string('address',200)->nullable();
            $table->text('describe')->nullable();
            $table->string('position',50)->nullable();
            $table->integer('idclub')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('disadvantages')->nullable();
            $table->string('advantages')->nullable();
            $table->integer('level');
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
}

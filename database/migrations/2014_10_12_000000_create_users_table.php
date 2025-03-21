<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->bigIncrements('id');

            $table->string('firstname');

            $table->string('lastname');

            $table->string('email');

            $table->string('username')->nullable();

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->string('telephone')->nullable();

            $table->string('profile_picture')->nullable();

            $table->rememberToken();

            $table->timestamps();

            $table->string('status');

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

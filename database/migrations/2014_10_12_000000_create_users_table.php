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
            $table->string('email', 140)->unique()->index();
            $table->string('username', 100)->unique()->index();
            $table->string('password');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('1:inactive; 2:active;');
            $table->tinyInteger('status_show', false)->unsigned()->default(2)->comment('1:hide; 2:show;');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
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

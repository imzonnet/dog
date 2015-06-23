<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
	  
            $table->increments('id');
			$table->string('firstname');
            $table->string('lastname');
            $table->string('avatar');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->string('activation_code')->nullable();
            $table->tinyInteger('activated')->state(0);
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('SET NULL');
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
		Schema::drop('users');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 255);
			$table->string('password', 60);
			$table->string('firstname', 255);
			$table->string('internetbs_api_key', 255);
			$table->string('internetbs_api_pass');
			$table->string('pgid', 255);
			$table->string('payglad_key', 255);
			$table->string('piwik_key');
			$table->string('remember_token', 100)->nullable();
			$table->boolean('is_admin')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
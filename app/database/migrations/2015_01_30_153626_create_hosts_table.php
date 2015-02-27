<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHostsTable extends Migration {

	public function up()
	{
		Schema::create('hosts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->string('name', 255);
			$table->string('ftp_adress', 255);
			$table->string('ftp_username', 255);
			$table->string('ftp_password', 255);
			$table->string('nameserver_1', 255);
			$table->string('nameserver_2');
		});
	}

	public function down()
	{
		Schema::drop('hosts');
	}
}
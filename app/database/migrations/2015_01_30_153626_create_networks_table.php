<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNetworksTable extends Migration {

	public function up()
	{
		Schema::create('networks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('networks');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmssTable extends Migration {

	public function up()
	{
		Schema::create('cmss', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('path', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cmss');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeostatesTable extends Migration {

	public function up()
	{
		Schema::create('seostates', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('site_id')->unsigned();
			$table->boolean('is_301')->default(0);
			$table->integer('indexed_pages')->unsigned()->default('0');
			$table->string('301_destination', 255);
			$table->integer('penalty')->unsigned()->default('0');
			$table->timestamps();
			$table->integer('indexed_backlinks')->unsigned()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('seostates');
	}
}
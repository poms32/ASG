<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatsTable extends Migration {

	public function up()
	{
		Schema::create('stats', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('turnover');
			$table->text('visits');
			$table->text('emails_catched');
		});
	}

	public function down()
	{
		Schema::drop('stats');
	}
}
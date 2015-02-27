<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration {

	public function up()
	{
		Schema::create('sites', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('network_id')->unsigned();
			$table->integer('host_id')->unsigned();
			$table->integer('cms_id')->unsigned();
			$table->string('domain', 255);
			$table->text('title');
			$table->text('description');
			$table->string('h1', 255);
			$table->integer('piwik_id')->unsigned();
			$table->text('internal_pages');
			$table->string('gsa_footprint', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sites');
	}
}
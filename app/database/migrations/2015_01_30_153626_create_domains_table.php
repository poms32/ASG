<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTable extends Migration {

	public function up()
	{
		Schema::create('domains', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->string('domain_name', 255);
		});
	}

	public function down()
	{
		Schema::drop('domains');
	}
}
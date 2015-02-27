<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('hosts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('networks', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->foreign('network_id')->references('id')->on('networks')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->foreign('host_id')->references('id')->on('hosts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->foreign('cms_id')->references('id')->on('cmss')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('seostates', function(Blueprint $table) {
			$table->foreign('site_id')->references('id')->on('sites')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('domains', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('hosts', function(Blueprint $table) {
			$table->dropForeign('hosts_user_id_foreign');
		});
		Schema::table('networks', function(Blueprint $table) {
			$table->dropForeign('networks_user_id_foreign');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->dropForeign('sites_user_id_foreign');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->dropForeign('sites_network_id_foreign');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->dropForeign('sites_host_id_foreign');
		});
		Schema::table('sites', function(Blueprint $table) {
			$table->dropForeign('sites_cms_id_foreign');
		});
		Schema::table('seostates', function(Blueprint $table) {
			$table->dropForeign('seostates_site_id_foreign');
		});
		Schema::table('domains', function(Blueprint $table) {
			$table->dropForeign('domains_user_id_foreign');
		});
	}
}
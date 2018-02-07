<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('websites', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->string('personal_website')->nullable();
			$table->string('facebook_username')->nullable();
			$table->string('github_username')->nullable();
			$table->string('google_plus_username')->nullable();
			$table->string('pinterest_username')->nullable();
			$table->string('twitter_username')->nullable();
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
		Schema::dropIfExists('websites');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//        Schema::table('tickets', function (Blueprint $table) {
//            $table->foreign('status_id')->references('id')->on('statuses')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//        });

		Schema::table('tickets', function (Blueprint $table) {
			$table->foreign('technician_id')->references('id')->on('technicians')
				->onDelete('restrict')
				->onUpdate('restrict');
		});

		Schema::table('tickets', function (Blueprint $table) {
			$table->foreign('queue_id')->references('id')->on('queues')
				->onDelete('restrict')
				->onUpdate('restrict');
		});

		Schema::table('comments', function (Blueprint $table) {
			$table->foreign('ticket_id')->references('id')->on('tickets')
				->onDelete('restrict')
				->onUpdate('restrict');
		});

		Schema::table('profiles', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('accounts')
				->onDelete('cascade');

			$table->foreign('website_id')->references('id')->on('websites');
		});

		Schema::table('websites', function (Blueprint $table) {
			$table->foreign('profile_id')->references('id')->on('profiles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//        Schema::table('tickets', function (Blueprint $table) {
//            $table->dropForeign('tickets_status_id_foreign');
//        });

		Schema::table('tickets', function (Blueprint $table) {
			$table->dropForeign('tickets_technician_id_foreign');
		});

		Schema::table('tickets', function (Blueprint $table) {
			$table->dropForeign('tickets_queue_id_foreign');
		});

		Schema::table('comments', function (Blueprint $table) {
			$table->dropForeign('comments_ticket_id_foreign');
		});
	}
}

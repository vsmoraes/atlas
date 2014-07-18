<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function($t) {
			$t->increments('id');
			$t->unsignedInteger('account_user_id');
			$t->string('description', 200);
			$t->float('amount');
			$t->dateTime('due_date');
			$t->float('previous_amount');
			$t->timestamps();

			$t->foreign('account_user_id')->references('id')->on('account_user');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}

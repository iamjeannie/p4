<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		# Create the accounts table
		Schema::create('accounts', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->integer('user_id')->unsigned();
			$table->string('name_first');
			$table->string('name_last');
			$table->date('dob');
			$table->string('address');
			$table->string('phone');
			$table->string('email')->unique();
			$table->string('event');

			# Define foreign keys...
			// $table->foreign('user_id')
			// 	->references('id')
			// 	->on('users');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		//
		// Schema::table('accounts', function($table) {
		// 	$table->dropForeign('accounts_user_id_foreign'); # table_fields_foreign
		// });
		Schema::drop('accounts');
	}

}

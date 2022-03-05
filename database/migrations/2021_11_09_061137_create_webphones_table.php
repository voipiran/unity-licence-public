<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebphonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webphones', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('user');
			$table->string('auth_user');
			$table->string('cid_name');
			$table->boolean('auto_answer');
			$table->boolean('enable');

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
		Schema::drop('webphones');
	}

}

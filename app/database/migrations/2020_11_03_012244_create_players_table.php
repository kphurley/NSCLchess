<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players', function($table){
			$table->increments('id');
			$table->string('name', 50);
			$table->string('school', 20);
			$table->integer('Grade');
			$table->integer('league_wins');
			$table->integer('league_losses');
			$table->integer('league_draws');
			$table->integer('league_points');
			$table->double('league_pt_pct');
			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('players');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatsToTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teams', function(Blueprint $table)
		{
			$table->integer('league_points');
			$table->integer('league_wins');
			$table->integer('league_losses');
			$table->integer('league_draws');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teams', function(Blueprint $table)
		{
			$table->dropColumn(array('league_points', 'league_wins', 'league_losses', 'league_draws'));
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatsToPlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('players', function(Blueprint $table)
		{
			$table->integer('white_wins');
			$table->integer('white_losses');
			$table->integer('white_draws');
			$table->integer('black_wins');
			$table->integer('black_losses');
			$table->integer('black_draws');
			$table->integer('league_pt_poss');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('players', function(Blueprint $table)
		{
			$table->dropColumn(array(
				'white_wins',
				'white_losses',
				'white_draws',
				'black_wins',
				'black_losses',
				'black_draws',
				'league_pt_poss'
			));
		});
	}

}

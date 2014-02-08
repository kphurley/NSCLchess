<?php

use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function($table){
			$table->increments('id');
			$table->string('homeschool');
			$table->double('homepoints');
			$table->string('visitorschool');
			$table->double('visitorpoints');
			$table->text('homeboard1');
			$table->double('homeboard1pts');
			$table->text('visitorboard1');
			$table->double('visitorboard1pts');
			$table->text('homeboard2');
			$table->double('homeboard2pts');
			$table->text('visitorboard2');
			$table->double('visitorboard2pts');
			$table->text('homeboard3');
			$table->double('homeboard3pts');
			$table->text('visitorboard3');
			$table->double('visitorboard3pts');
			$table->text('homeboard4');
			$table->double('homeboard4pts');
			$table->text('visitorboard4');
			$table->double('visitorboard4pts');
			$table->text('homeboard5');
			$table->double('homeboard5pts');
			$table->text('visitorboard5');
			$table->double('visitorboard5pts');
			$table->text('homeboard6');
			$table->double('homeboard6pts');
			$table->text('visitorboard6');
			$table->double('visitorboard6pts');
			$table->text('homeboard7');
			$table->double('homeboard7pts');
			$table->text('visitorboard7');
			$table->double('visitorboard7pts');
			$table->text('homeboard8');
			$table->double('homeboard8pts');
			$table->text('visitorboard8');
			$table->double('visitorboard8pts');
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
		Schema::drop('matches');
	}

}
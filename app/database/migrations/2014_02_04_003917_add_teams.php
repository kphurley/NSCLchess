<?php

use Illuminate\Database\Migrations\Migration;

class AddTeams extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('teams')->insert(array(
				'school'=> 'Deerfield',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Stevenson',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Highland Park',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Glenbrook South',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Glenbrook North',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Mundelein Carmel',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Mundelein',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Lake Forest',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Waukegan',
				'division'=> 'North',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Niles North',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Evanston',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'New Trier',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Niles West',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Maine West',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Northridge Prep',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Maine South',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
		DB::table('teams')->insert(array(
				'school'=> 'Notre Dame',
				'division'=> 'South',
				'created_at'=> date('Y-m-d H:m:s'),
				'updated_at'=> date('Y-m-d H:m:s')
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		for($i=1; $i<=17; $i++){
			DB::table('teams')->delete(i);
		}
	}

}
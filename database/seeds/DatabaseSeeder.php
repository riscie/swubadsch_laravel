<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('CommentsSeeder');
        $this->call('DatesSeeder');
        $this->call('UsersSeeder');
        $this->call('date_user_pivotSeeder');
	}

}

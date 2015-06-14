<?php
/**
 * Created by PhpStorm.
 * User: lh
 * Date: 27.05.2015
 * Time: 16:53
 */

use Illuminate\Database\Seeder;

class date_user_pivotSeeder extends Seeder {

    public function run()
    {
        // wipe the table clean before populating
        DB::table('date_user')->delete();
		
		


        $pivots = array(
            ['date_id' => 2, 'user_id' => '1'],
            ['date_id' => 3, 'user_id' => '2'],
            ['date_id' => 3, 'user_id' => '6'],
            ['date_id' => 8, 'user_id' => '2'],
            ['date_id' => 3, 'user_id' => '1'],
            ['date_id' => 3, 'user_id' => '3'],
        );

        // Uncomment to run the seeder
        DB::table('date_user')->insert($pivots);
    }

}
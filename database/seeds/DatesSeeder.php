<?php
/**
 * Created by PhpStorm.
 * User: lh
 * Date: 27.05.2015
 * Time: 16:53
 */

use Illuminate\Database\Seeder;

class DatesSeeder extends Seeder {

    public function run()
    {
        // wipe the table clean before populating
        DB::table('dates')->delete();
		
		
		//Creating some realistic entrys with current DateTime
		$today = new DateTime;
		$todayMinusOne = new DateTime;
		$todayPlusOne = new DateTime;
		$todayPlusTwo = new DateTime;
		$todayPlusThree = new DateTime;
		$todayPlusFour = new DateTime;
		$todayPlusFive = new DateTime;
		$todayPlusSix = new DateTime;
		$todayPlusSeven = new DateTime;
		$todayPlusEight = new DateTime;
				
		$todayMinusOne = $todayMinusOne->modify('-1day');
		$todayPlusOne = $todayPlusOne->modify('+1 day');
		$todayPlusTwo = $todayPlusTwo->modify('+2 day');
		$todayPlusThree = $todayPlusThree->modify('+3 day');
		$todayPlusFour = $todayPlusFour->modify('+4 day');
		$todayPlusFive = $todayPlusFive->modify('+5 day');
		$todayPlusSix = $todayPlusSix->modify('+6 day');
		$todayPlusSeven = $todayPlusSeven->modify('+7 day');
		$todayPlusEight = $todayPlusEight->modify('+8 day');
		

        $dates = array(
            ['id' => 1, 'date' => $todayMinusOne, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'date' => $today, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'date' => $todayPlusOne, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 5, 'date' => $todayPlusThree, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 6, 'date' => $todayPlusFour, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 8, 'date' => $todayPlusFive, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 9, 'date' => $todayPlusSix, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment to run the seeder
        DB::table('dates')->insert($dates);
    }

}
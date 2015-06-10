<?php
/**
 * Created by PhpStorm.
 * User: lh
 * Date: 27.05.2015
 * Time: 16:53
 */

use Illuminate\Database\Seeder;

class AvatarsSeeder extends Seeder {

    public function run()
    {
        // Wipe the table clean before populating
        DB::table('avatars')->delete();

        $avatars = array();

        //Creating file-paths here
        for ($i=1; $i<=125;$i++)
        {
            array_push($avatars,['filename' => '16x16_'.$i.'.png', 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        }



        // Uncomment to run the seeder
        DB::table('avatars')->insert($avatars);
    }

}
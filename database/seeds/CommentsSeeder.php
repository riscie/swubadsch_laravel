<?php
/**
 * Created by PhpStorm.
 * User: lh
 * Date: 27.05.2015
 * Time: 16:53
 */

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder {

    public function run()
    {
        // Wipe the table clean before populating
        DB::table('comments')->delete();

        $comments = array(
            ['id' => 1, 'user_id' => '1', 'date_id' => 2, 'text' => 'First comment ever!', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'user_id' => '3', 'date_id' => 4, 'text' => 'Second comment ever!', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'user_id' => '4', 'date_id' => 4, 'text' => 'Another comment on the same date!', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'user_id' => '2', 'date_id' => 6, 'text' => 'Third comment ever!', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );

        // Uncomment to run the seeder
        DB::table('comments')->insert($comments);
    }

}
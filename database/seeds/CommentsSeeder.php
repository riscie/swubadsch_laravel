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
            ['user_id' => '1', 'date_id' => 2, 'text' => 'Spielt heute sonst noch wer?', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['user_id' => '1', 'date_id' => 3, 'text' => 'Wer fährt? Ich bin morgen mit dem Zug da...', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['user_id' => '3', 'date_id' => 3, 'text' => 'Ich fahre!', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['user_id' => '2', 'date_id' => 7, 'text' => 'Freitgas-Sport! Who\'s in?', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );

        // Uncomment to run the seeder
        DB::table('comments')->insert($comments);
    }

}
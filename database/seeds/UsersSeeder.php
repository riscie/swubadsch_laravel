<?php
/**
 * Created by PhpStorm.
 * User: lh
 * Date: 27.05.2015
 * Time: 16:53
 */

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    public function run()
    {
        // wipe the table clean before populating
        DB::table('users')->delete();
		
		


        $users = array(
            ['id' => 1, 'name' => 'Matthias', 'email' => 'risc@langaust.com', 'password' => '$2y$10$kpkDskWOWuvBYbPI8pD46ORpcoC4.bRZFUM0m4uMI4zOFIINxyQFK', 'remember_token' => 'CFDloegyia6ELAqp56fbkt6Xkrhhk3sCCpnRdpMW0iVGcWE77tCBhuyz4k4f', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Mensur', 'email' => 'mensur.gafuri@stanzwerk.com', 'password' => '$2y$10$dPF.rZyJKJy9JaFFuzet3ukx7rUvlTY.Z6KUizYSoTkUxWovwpJyK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Mike', 'email' => 'mike@mike.com', 'password' => '$2y$10$kpkDskWOWuvBYbPI8pD46ORpcoC4.bRZFUM0m4uMI4zOFIINxyQFK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Andy', 'email' => 'randy@andy.com', 'password' => '$2y$10$kpkDskWOWuvBYbPI8pD46ORpcoC4.bRZFUM0m4uMI4zOFIINxyQFK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Thomy', 'email' => 'thom@thomy.de', 'password' => '$2y$10$kpkDskWOWuvBYbPI8pD46ORpcoC4.bRZFUM0m4uMI4zOFIINxyQFK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Metin', 'email' => 'metin@balaban.com', 'password' => '$2y$10$kpkDskWOWuvBYbPI8pD46ORpcoC4.bRZFUM0m4uMI4zOFIINxyQFK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Adrian', 'email' => 'seiler@seiler-industries.com', 'password' => '$2y$10$kpkDskWOWuvBYbPI8pD46ORpcoC4.bRZFUM0m4uMI4zOFIINxyQFK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment to run the seeder
        DB::table('users')->insert($users);
    }

}
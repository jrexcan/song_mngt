<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
         try {
            User::truncate();
            $json = File::get('database/data/user/user.json');
            $data = json_decode($json, true);
            foreach ($data as $obj) {
                User::create([
                    'first_name' => $obj['first_name'],
                    'last_name' => $obj['last_name'],
                    'email' => $obj['email'],
                    'password' => bcrypt($obj['password'])
                ]);
            }
        } catch (Exception $e) {
            Log::info("SongError: {$e->getMessage()}");
        }
    }
}

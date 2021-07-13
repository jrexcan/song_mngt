<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Song;

class SongLyricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        try {
            Song::truncate();
            $json = File::get('database/data/songs/lyrics.json');
            $data = json_decode($json, true);
            foreach ($data as $obj) {
                Song::create([
                    'title' => $obj['title'],
                    'artist' => $obj['artist'],
                    'lyrics' => $obj['lyrics']
                ]);
            }
        } catch (Exception $e) {
            Log::info("SongError: {$e->getMessage()}");
        }
    }
}

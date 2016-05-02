<?php

use ComicApi\Comics\Issues\Seeds\IssueSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\ComicApi\Comics\Creators\Seeds\CreatorSeeder::class);
    }
}

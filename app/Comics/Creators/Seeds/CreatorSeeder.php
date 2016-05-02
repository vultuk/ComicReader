<?php namespace ComicApi\Comics\Creators\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use ComicApi\Comics\Creators\Commands\AddCreatorCommand;

class CreatorSeeder extends Seeder
{
    use DispatchesJobs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->dispatch(
            new AddCreatorCommand(
                'Dark Legacy Comics',
                'http://www.darklegacycomics.com',
                'http://www.darklegacycomics.com/feed.xml',
                'http://www.darklegacycomics.com/images/logo.png'
            )
        );
    }
}
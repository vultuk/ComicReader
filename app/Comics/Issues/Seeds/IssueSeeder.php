<?php namespace ComicApi\Comics\Issues\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Issues\Commands\CreateIssueCommand;
use ComicApi\Comics\Issues\Commands\CreatePageCommand;

class IssueSeeder extends Seeder
{
    use DispatchesJobs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Gold Cap';

        $creator = Creator::find(1);

        $firstIssue = $this->dispatch(
            new CreateIssueCommand($creator, '535', $title)
        );

        $this->dispatch(
            new CreatePageCommand($firstIssue, $title, 'http://darklegacycomics.com/comics/535.jpg')
        );

    }
}
<?php

namespace ComicApi\Console\Commands;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Issues\Jobs\ImportLatestIssuesJob;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ImportLatestIssues extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:issues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Issues for Comic Creators';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $creators = Creator::all();

        foreach ($creators as $creator) {
            $this->dispatch(
                new ImportLatestIssuesJob($creator)
            );
        }
    }
}

<?php namespace ComicApi\Comics\Issues\Jobs;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Issues\Commands\CreateIssueCommand;
use ComicApi\Comics\Issues\Commands\CreatePageCommand;
use ComicApi\Jobs\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ImportLatestIssuesJob extends Job implements ShouldQueue
{
    use DispatchesJobs;

    /**
     * @var Creator
     */
    protected $creator;

    protected $xmlFile;

    /**
     * ImportLatestIssuesJob constructor.
     * @param Creator $creator
     */
    public function __construct(Creator $creator)
    {
        $this->creator = $creator;
    }

    public function handle()
    {
        $this->loadXml($this->creator->feed_url)
            ->parseXml();


    }

    protected function parseXml()
    {
        foreach ($this->xmlFile->channel->item as $item) {
            $newIssue = $this->dispatch(
                new CreateIssueCommand($this->creator, '123', $item->title)
            );

            $this->dispatch(
                new CreatePageCommand($newIssue, $item->title, $item->link)
            );
        }
    }

    protected function loadXml($url)
    {
        $this->xmlFile = simplexml_load_file($url);

        return $this;
    }

}
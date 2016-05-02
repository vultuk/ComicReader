<?php namespace ComicApi\Comics\Issues\Jobs;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Jobs\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CreateIssueJob extends Job implements ShouldQueue
{
    use DispatchesJobs;

    /**
     * @var Creator
     */
    protected $creator;

    /**
     * @var string
     */
    protected $issueId;

    /**
     * @var string
     */
    protected $title;

    /**
     * CreateIssueCommand constructor.
     * @param Creator $creator
     * @param int $issueId
     * @param string $title
     */
    public function __construct(Creator $creator, $issueId, $title)
    {
        $this->creator = $creator;
        $this->issueId = $issueId;
        $this->title = $title;
    }

    public function handle()
    {
        $this->dispatch(
            new CreateIssueJob($this->creator, $this->issueId, $this->title)
        );
    }

}
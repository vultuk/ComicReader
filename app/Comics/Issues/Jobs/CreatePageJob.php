<?php namespace ComicApi\Comics\Issues\Jobs;

use ComicApi\Comics\Issues\Models\Issue;
use ComicApi\Jobs\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CreatePageJob extends Job implements ShouldQueue
{
    use DispatchesJobs;

    /**
     * @var Issue
     */
    protected $issue;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * CreatePageCommand constructor.
     * @param Issue $issue
     * @param string $title
     * @param string $imageUrl
     */
    public function __construct(Issue $issue, $title, $imageUrl)
    {
        $this->issue = $issue;
        $this->title = $title;
        $this->imageUrl = $imageUrl;
    }

    public function handle()
    {
        $this->dispatch(
            new CreatePageJob($this->issue, $this->title, $this->imageUrl)
        );
    }

}
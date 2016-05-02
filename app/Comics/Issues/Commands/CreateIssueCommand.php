<?php namespace ComicApi\Comics\Issues\Commands;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Issues\Models\Issue;
use ComicApi\Jobs\Job;

class CreateIssueCommand extends Job
{

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
     * @param string $issueId
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
        return $this->creator->issues()->create([
            'title' => $this->title,
            'issue_id' => $this->issueId,
        ]);
    }

}
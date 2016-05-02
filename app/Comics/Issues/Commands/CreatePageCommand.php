<?php namespace ComicApi\Comics\Issues\Commands;

use ComicApi\Comics\Issues\Models\Issue;
use ComicApi\Jobs\Job;

class CreatePageCommand extends Job
{

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
        return $this->issue->pages()->create([
            'title' => $this->title,
            'image_url' => $this->imageUrl,
        ]);
    }

}
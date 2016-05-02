<?php namespace ComicApi\Comics\Creators\Jobs;

use ComicApi\Comics\Creators\Commands\AddCreatorCommand;
use ComicApi\Jobs\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

class AddCreatorJob extends Job implements ShouldQueue
{
    use DispatchesJobs;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $feedUrl;

    /**
     * @var string
     */
    protected $logo;

    /**
     * AddCreatorCommand constructor.
     * @param string $name
     * @param string $url
     * @param string $feedUrl
     * @param string $logo
     */
    public function __construct($name, $url, $feedUrl, $logo)
    {
        $this->name = $name;
        $this->url = $url;
        $this->feedUrl = $feedUrl;
        $this->logo = $logo;
    }

    public function handle()
    {
        $this->dispatch(
            new AddCreatorCommand($this->name, $this->url, $this->feedUrl, $this->logo)
        );
    }

}
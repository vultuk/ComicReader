<?php namespace ComicApi\Comics\Creators\Commands;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Jobs\Job;

class AddCreatorCommand extends Job
{

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
        return Creator::create([
            'name' => $this->name,
            'url' => $this->url,
            'feed_url' => $this->feedUrl,
            'logo' => $this->logo,
        ]);
    }

}
<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatorsTest extends TestCase
{

    public function testShouldGetAListOfComicCreators()
    {
        $this->visit('/api/v1/creators')
            ->seeJson([
                'success' => true,
            ])
            ->seeJsonStructure([
                'success',
                'data',
            ]);
    }

    public function testShouldGetDetailsOfOneComicCreator()
    {
        $this->visit('/api/v1/creators/1');
    }


}
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get(route('news/index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->get(route('all_news/showCategoryNews', ['category' => 'asdasdasdasdasdasd']));

        $response->assertStatus(200);
    }
}

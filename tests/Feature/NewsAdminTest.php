<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminPageAvailable()
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);
    }

    public function testNewsListAvailable()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testNewsCreateAvailable()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testNewsStoreJSON()
    {
        $data = [
            'title' => 'adafs',
            'author' => 'qwerwqerwqe',
            'status' => 'DRAFT',
            'description' => 'oishdpfphuih45345234lijdslfjhdasflhg'    
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertStatus(200);
        $response->assertJson($data);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
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
    use RefreshDatabase;
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

    public function testNewsStore()
    {
        $category = Category::factory()->create();
        $newsFactoryData = News::factory()->definition();
        $categories = ['categories' => $category->id];

    
        $response = $this->post(route('admin.news.store'), $newsFactoryData + $categories);

        $response->assertStatus(302);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get(route('categories/index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $category = Category::factory()->create();
        $categories = ['category' => $category->id];
        $response = $this->get(route('all_news/showCategoryNews', $categories));

        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminCategoriesAvailable()
    {
        $response = $this->get('admin/categories/index');

        $response->assertStatus(200);
    }

    public function testAdminCategoriesCreate()
    {
        $response = $this->get('admin/categories/create');

        $response->assertStatus(200);
    }
}

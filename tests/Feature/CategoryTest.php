<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_page_category_returns_a_successful_response()
    {
        $response = $this->get('/category/{slug}');

        $response->assertStatus(200);
    }

    public function test_a_category_one_view_can_be_rendered()
    {
        $view = $this->view('news.category', [
            'category' => [
                1 => [
                    'id' => 1,
                    'title' => 'Cпорт',
                    'slug' => 'sport'
                ]
        ]]);

        $view->assertSee('Спорт');
    }
}

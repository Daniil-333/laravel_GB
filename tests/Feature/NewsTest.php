<?php

namespace Tests\Feature;

use App\Models\Category;
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
    public function test_page_news_returns_a_successful_response()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_a_news_view_can_be_rendered()
    {
        $view = $this->view('news.categories', ['category' => [
            1 => [
                'id' => 1,
                'title' => 'Cпорт',
                'slug' => 'sport'
            ]
        ]]);

        $view->assertSee('Спорт');
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_page_admin_returns_a_successful_response()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_a_admin_view_cane_be_rendered()
    {
        $view = $this->view('admin.index', ['name' => 'Админка']);

        $view->assertSee('Админка');
    }
}

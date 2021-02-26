<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $response = $this->get('/domains');

        $response->assertStatus(200);
    }
    public function test_index()
    {
        $response = $this->get('/domains/{id}');

        $response->assertStatus(500);
    }

    public function test_checks()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_checks_post()
    {
        $response = $this->post('/domains/{id}/checks');

        $response->assertStatus(500);
    }

    public function test_domains_post()
    {
        $response = $this->post('/domains');

        $response->assertStatus(302);
    }
}

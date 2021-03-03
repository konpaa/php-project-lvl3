<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMain(): void
    {
        $response = $this->get(route('main'));
        $response->assertOk();
    }
}

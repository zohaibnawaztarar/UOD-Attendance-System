<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testDashboard()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }
    
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }


}

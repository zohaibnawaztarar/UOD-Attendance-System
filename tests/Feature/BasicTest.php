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
    //Make sure homepage is working
    public function testHomepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    //Make sure Register page is working
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    //Make sure Dashboard page is not accessible for non logged users.
    public function testDashboard()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }

    //Make sure lecturers page is not accessible for non logged users.
    public function testlecturers()
    {
        $response = $this->get('/lecturers');
        $response->assertStatus(401);
    }

    //Make sure students page is not accessible for unauthorised users.
    public function teststudents()
    {
        $response = $this->get('/students');
        $response->assertStatus(401);
    }

    //Make sure systemAdmin page is not accessible for unauthorised users.
    public function testsystemAdmin()
    {
        $response = $this->get('/systemAdmin');
        $response->assertStatus(401);
    }

    //Make sure addSchoolStaff page is not accessible for unauthorised users.
    public function testaddSchoolStaff()
    {
        $response = $this->get('/addSchoolStaff');
        $response->assertStatus(401);
    }

    //Make sure schoolAdmin page is not accessible for unauthorised users.
    public function testschoolAdmin()
    {
        $response = $this->get('/schoolAdmin');
        $response->assertStatus(401);
    }

    //Make sure addLecturer page is not accessible for unauthorised users.
    public function testaddLecturer()
    {
        $response = $this->get('/addLecturer');
        $response->assertStatus(401);
    }




}

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
    public function testLecturers()
    {
        $response = $this->get('/lecturers');
        $response->assertStatus(401);
    }

    //Make sure students page is not accessible for unauthorised users.
    public function testStudents()
    {
        $response = $this->get('/students');
        $response->assertStatus(401);
    }

    //Make sure systemAdmin page is not accessible for unauthorised users.
    public function testSystemAdmin()
    {
        $response = $this->get('/systemAdmin');
        $response->assertStatus(401);
    }

    //Make sure addSchoolStaff page is not accessible for unauthorised users.
    public function testAddSchoolStaff()
    {
        $response = $this->get('/addSchoolStaff');
        $response->assertStatus(401);
    }

    //Make sure schoolAdmin page is not accessible for unauthorised users.
    public function testSchoolAdmin()
    {
        $response = $this->get('/schoolAdmin');
        $response->assertStatus(401);
    }

    //Make sure addLecturer page is not accessible for unauthorised users.
    public function testAddLecturer()
    {
        $response = $this->get('/addLecturer');
        $response->assertStatus(401);
    }
//Make sure addLocation page is not accessible for unauthorised users.
    public function testAddLocation()
    {
        $response = $this->get('/addLocation');
        $response->assertStatus(401);
    }

    //Make sure addModule page is not accessible for unauthorised users.
    public function testAddModule()
    {
        $response = $this->get('/addModule');
        $response->assertStatus(401);
    }

    public function testAddSession()
    {
        $response = $this->get('/addSession');
        $response->assertStatus(401);
    }

    public function testAttendanceReports()
    {
        $response = $this->get('/attendanceReports');
        $response->assertStatus(401);
    }

    public function testDeleteLecturers()
    {
        $response = $this->get('/deleteLecturers');
        $response->assertStatus(401);
    }

    public function testDeleteLocation()
    {
        $response = $this->get('/deleteLocation');
        $response->assertStatus(401);
    }

    public function testDeleteModule()
    {
        $response = $this->get('/deleteModule');
        $response->assertStatus(401);
    }

    public function testDeleteSession()
    {
        $response = $this->get('/deleteSession');
        $response->assertStatus(401);
    }

    public function testDisenrollStudents()
    {
        $response = $this->get('/disenrollStudents');
        $response->assertStatus(401);
    }

    public function testManualSignIn()
    {
        $response = $this->get('/manualSignin');
        $response->assertStatus(401);
    }

    public function testModuleEnrolment()
    {
        $response = $this->get('/moduleEnrolment');
        $response->assertStatus(401);
    }

    public function testMyReports()
    {
        $response = $this->get('/myReports');
        $response->assertStatus(404);
    }

    public function testSettings()
    {
        $response = $this->get('/settings');
        $response->assertStatus(401);
    }

    public function testQRLecturers()
    {
        $response = $this->get('/QRlecturers');
        $response->assertStatus(401);
    }

    public function testChangePassword()
    {
        $response = $this->get('/changePassword');
        $response->assertStatus(302);
    }


}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FirstTest extends TestCase
{
//    use DatabaseMigrations;
//    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(array_sum([1,2,3]) == 6);
    }

    public function test_main_page()
    {
        $response = $this->get('/');
        $this->assertTrue($response->status() == 200);
        $this->assertEquals($response->status(), 200);
        $response->assertOk();
        $response->assertSee('New Products');
//        $response->status();
    }

    public function test_incorrect_main_request()
    {
        $postResponse = $this->post('/', []);
        $putResponse = $this->post('/', []);
        $deleteResponse = $this->post('/', []);
        $postResponse->assertStatus(405);
        $putResponse->assertStatus(405);
        $deleteResponse->assertStatus(405);
    }



}

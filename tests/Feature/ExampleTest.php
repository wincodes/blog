<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanViewAboutPage()
    {
        $resp = $this->get('/about');

        
        $resp->assertStatus(200);
        $resp->assertSee("About Us");
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;

class viewABlogPostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanViewABlogPost()
    {
        
        //arrangement step
        //Creating a blog post
        $post = ([
            'id' => 1,
            'title' => 'A simple title',
            'body' => 'A simple body',
        ]);
        //action
        //visiting a route
        $resp = $this->get("/post/{$post->id}");
        //assert
        //assert a sstatus code 200
        $resp->assertStatus(200);
        //assert that we see post title
        $resp->assertSee($post->title);
        //assert that we see post body
        $resp->assertSee($post->body);
        //assert that we see published date
        $resp->assertSee($post->created_at);
                
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_threads()
    {
        $this->withExceptionHandling();

        $this->get('/threads/create')
             ->assertRedirect('/login');

        $this->post('/threads')
             ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_forum_threads()
    {
        //Given we have an auth user
        $this->signIn();
        //$this->actingAs(create('App\User'));

        //When we hit the endpoint to create new thread
        $thread = create('App\Thread');
        $this->post('/threads', $thread->toArray());

        //Then we visit the new page
        $this->get($thread->path())

        //We should see the new thread

        ->assertSee($thread->title)
        ->assertSee($thread->body);





    }
}
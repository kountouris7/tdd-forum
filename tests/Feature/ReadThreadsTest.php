<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;
   // protected $thread;


    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->get('/threads')
             ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_read_a_single_thread()
    {
        $this->get('/threads/' . $this->thread->id)
             ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        //Given we have a thread
        //and that thread includes replies
        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);
        //When we visit a thread page
        $this->get('/threads/' . $this->thread->id)
            //then we should see replies
             ->assertSee($reply->body);
    }
}

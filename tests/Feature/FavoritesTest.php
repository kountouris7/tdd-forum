<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_cannot_favorite_anything()
    {
        $this->withExceptionHandling()
             ->post('replies/1/favorites')
             ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_may_favorite_any_reply()
    {
        $this->signIn();

        $reply = create('App\Reply');
        //if i post to favorite endpoint
        $this->post('replies/' . $reply->id . '/favorites');
        //it should be recorded in database
        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();
        $reply = create('App\Reply');

        try {
            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail('Did not expect to set the same record twice');
        }


        $this->assertCount(1, $reply->favorites);
    }
}
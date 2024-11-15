<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCreationTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_post()
    {
        $user = User::factory()->create();

        $post = Post::create([
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
            'user_id' => $user->id,
            'category_id' => 1,
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
        ]);

        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals('Test Post', $post->title);
    }
}

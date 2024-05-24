<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\VideosApiController::class
 */

class VideoApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_users_can_index_published_videos()
    {
        $videos = create_sample_videos();

        $response = $this->get('/api/videos/');

        $response->assertStatus(200);

        $response->assertJsonCount(count($videos));
    }

    /** @test */
    public function guest_users_can_show_published_videos()
    {
        $video = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/2NnTOzZBieM?si=J5UGVvT4EnUTfXmL'
        ]);
        $response = $this->getJson('/api/videos/' . $video->id);

        $response->assertStatus(200);

        $response->assertSee($video->title);
        $response->assertSee($video->description);
        $response->assertSee($video->id);

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('id', $video->id)
            ->where('title', $video->title)
            ->where('url', $video->url)
            ->etc()
            );

        //$response->assertJsonPath('title', $video->title);
    }

    /** @test */
    public function guest_users_cannot_show_unexisting_videos()
    {
        $response = $this->get('/api/videos/999');

        $response->assertStatus(404);
    }


}

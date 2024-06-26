<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;
    /**
     @test
     */
    public function can_get_formatted_date()
    {
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('December 13, 2020 8:00pm'),
            'previous' => null,
            'next' => null,
            'serie_id' => 1
        ]);

        $dateToTest = $video->formatted_published_at;

        $this->assertEquals($dateToTest, '13 de desembre de 2020');


    }

    /**
     * @test
     */
    public function video_have_serie()
    {
        $video = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://youtu.be/w8j07_DBl_I',
        ]);

        $this->assertNull($video->serie);

        $serie = Serie::create([
            'title' => 'Apren TDD',
            'description' => 'Bla bla bla',
            'image' => '0gSfr5mCbb5qLwoWdxS3gCrU0v1Xf8ny6TrgtNUe.png',
            'teacher_name' => 'Sergi Tur Badenas',
            'teacher_photo_url' => 'https://www.gravatar.com/avatar/' . md5('sergiturbadenas@gmail.com'),
        ]);

        $video->setSerie($serie);

        $this->assertNotNull($video->fresh()->serie);

    }
}

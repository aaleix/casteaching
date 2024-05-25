<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Tests\Feature\Videos\VideoApiTest;


class VideosApiController extends Controller
{
    public static function testedBy()
    {
        return VideoApiTest::class;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Video::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Video::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);
        $video->title=$request->title;
        $video->description=$request->description;
        $video->url=$request->url;
        $video->save();
        return $video;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return $video;
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Unit\VideoTest;

class Video extends Model
{
    use HasFactory;

    public static function testedBy()
    {
        return VideoTest::class;
    }

    protected $guarded = [];

    protected $dates = ['published_at'];

    public function getFormattedPublishedAtAttribute()
    {
//        Carbon::setLocale('ca');
        $locale_date=Carbon::parse($this->published_at)->locale(config('app.locale'));
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }
    public function getFormattedForHumansPublishedAttribute()
    {
        return optional($this->published_at)->diffForHumans(Carbon::now());
    }
    public function getPublishedAtTimestampAttribute(){
        return optional($this->published_at)->timestamp;
    }
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function setSerie(Serie $serie)
    {
        $this->serie_id = $serie->id;
        $this->save();
        return $this;
    }
    public function canBeDisplayed()
    {
        return true;
    }
}

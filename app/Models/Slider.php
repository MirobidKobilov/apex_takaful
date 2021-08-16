<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getShortTextAttribute()
    {
        return $this->{'short_text_'.app()->getLocale()};
    }

    public function getLongTextAttribute()
    {
        return $this->{'long_text_'.app()->getLocale()};
    }
}

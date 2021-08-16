<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }
}

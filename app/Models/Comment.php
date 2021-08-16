<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDescriptionAttribute()
    {
        return $this->{'description_'.app()->getLocale()};
    }

    public function getJobAttribute()
    {
        return $this->{'job_'.app()->getLocale()};
    }

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }
}

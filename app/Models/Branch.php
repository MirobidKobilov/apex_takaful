<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getAdressAttribute()
    {
        return $this->{'adress_'.app()->getLocale()};
    }

    public function lat()
    {
          $a = explode(', ',$this->coordinate);
          return  $a[0];
    }

    public function long()
    {
          $a = explode(', ',$this->coordinate);
          return  $a[1];
    }
}

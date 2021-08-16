<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function getTitleAttribute()
	{
		return $this->{'title_'.app()->getLocale()};
	}

    public function page()
    {
        return $this->hasOne(Page::class, 'page_id', 'id');
    }

    public function getMakeUrlAttribute()
	{
		$page = Page::find($this->page_id);
		return isset($page) ? route('pages.show', ['id' => $page->id]) : '';
	}
}

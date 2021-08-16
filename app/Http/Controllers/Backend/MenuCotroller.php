<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;

class MenuCotroller extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('backend.menu.index', compact('pages'));
    }

    public function data()
    {
        $query = Menu::query();
        return datatables()->of($query)->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'title_ru'    => 'required|max:255',
            'title_uz'    => 'nullable|max:255',
            'title_en'    => 'nullable|max:255',
            'page_id'     => 'required',
            'parents_num'  => 'required',
        ]);

        $entered = Menu::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('меню успешно обновлено!');
        } else {
            $entered = Menu::create($data);            
            $message = trans('меню успешно добавлено!');
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Menu::find(request()->input('id'));
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('меню успешно удалено!')
            ];                                   
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Пожалуйста попробуйте снова'
            ];
        }
      
      return response()->json($response);
    }
}

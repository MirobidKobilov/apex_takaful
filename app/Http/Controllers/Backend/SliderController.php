<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        return view('backend.sliders.index');
    }

    public function data()
    {
        $query = Slider::query();
        return datatables()->of($query)
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img'])
        ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'title_ru'         => 'required|max:255',
            'title_uz'         => 'nullable|max:255',
            'title_en'         => 'nullable|max:255',
            'short_text_ru'    => 'required|max:255',
            'short_text_uz'    => 'nullable|max:255',
            'short_text_en'    => 'nullable|max:255',
            'long_text_ru'     => 'required|max:255',
            'long_text_uz'     => 'nullable|max:255',
            'long_text_en'     => 'nullable|max:255',
            'img'              => 'nullable|mimes:jpg,jpeg,png|max:50000'
        ]);        

        $entered = Slider::find(request()->id);
        
        if ($entered) {
            $entered->update($data);
            $message = trans('слайдер успешно обновлен!');
        } else {
            $entered = Slider::create($data);            
            $message = trans('слайдер успешно добавлен!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('sliders/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Slider::find(request()->input('id'));			
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('слайдер успешно удален!')
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

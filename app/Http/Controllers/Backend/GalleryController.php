<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return view('backend.gallery.index');
    }

    public function data()
    {
        $query = Gallery::query();
        return datatables()->of($query)
            ->editColumn('img', function ($item) {
                return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
            })->rawColumns(['img'])
            ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'img'              => 'required'
        ]);        

        $entered = Gallery::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('галлерея успешно обновлена!');
        } else {
            $entered = Gallery::create($data);            
            $message = trans('галлерея успешно добавлена!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('galleries/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Gallery::find(request()->input('id'));			
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

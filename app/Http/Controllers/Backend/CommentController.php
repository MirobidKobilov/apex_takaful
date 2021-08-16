<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    public function index()
    {
        return view('backend.comments.index');
    }

    public function data()
    {
        $query = Comment::query();
        return datatables()->of($query)
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img'])
        ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'description_ru'  => 'required|max:1000',
            'description_uz'  => 'nullable|max:1000',
            'description_en'  => 'nullable|max:1000',
            'name_ru'         => 'required|max:255',
            'name_uz'         => 'nullable|max:255',
            'name_en'         => 'nullable|max:255',
            'job_ru'          => 'required|max:255',
            'job_uz'          => 'nullable|max:255',
            'job_en'          => 'nullable|max:255',
            'img'             => 'nullable|mimes:jpg,jpeg,png|max:50000'
        ]);        

        $entered = Comment::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('комментарий успешно обновлен!');
        } else {
            $entered = Comment::create($data);            
            $message = trans('комментарий успешно добавлен!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('comments/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Comment::find(request()->input('id'));			
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('комментарий успешно удален!')
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

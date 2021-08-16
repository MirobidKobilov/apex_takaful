<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        return view('backend.partners.index');
    }

    public function data()
    {
        $query = Partner::query();
        return datatables()->of($query)
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img'])
        ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'url'            => 'nullable|max:255',
            'img'            => 'nullable|mimes:jpg,jpeg,png|max:50000'
        ]);        

        $entered = Partner::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('партнёр успешно обновлен!');
        } else {
            $entered = Partner::create($data);            
            $message = trans('партнёр успешно добавлен!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('partners/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Partner::find(request()->input('id'));			
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('партнёр успешно удален!')
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

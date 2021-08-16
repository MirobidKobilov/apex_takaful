<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        return view('backend.staffs.index');
    }

    public function data()
    {
        $query = Staff::query();
        return datatables()->of($query)
        ->editColumn('img', function($item) {
            return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
        })->rawColumns(['img'])
        ->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'name'           => 'required|max:255',
            'job_ru'         => 'required|max:255',
            'job_uz'         => 'nullable|max:255',
            'job_en'         => 'nullable|max:255',
            'img'            => 'nullable|mimes:jpg,jpeg,png'
        ]);        

        $entered = Staff::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('работник успешно обновлен!');
        } else {
            $entered = Staff::create($data);            
            $message = trans('работник успешно добавлен!');
		}
		
		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('staffs/'.$entered->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Staff::find(request()->input('id'));			
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('работник успешно удален!')
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

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        return view('backend.branches.index');
    }

    public function data()
    {
        $query = Branch::query();
        return datatables()->of($query)->toJson();
    }

    public function form()
    {
        $data = request()->validate([
            'title_ru'           => 'required|max:255',
            'title_uz'           => 'nullable|max:255',
            'title_en'           => 'nullable|max:255',
            'adress_ru'          => 'required|max:255',
            'adress_uz'          => 'nullable|max:255',
            'adress_en'          => 'nullable|max:255',
            'mail'               => 'nullable|max:255',
            'coordinate'         => 'required|max:255',
        ]);

        $entered = Branch::find(request()->id);
        
        if ($entered) {
            $entered->update($data);            
            $message = trans('филиал успешно обновлен!');
        } else {
            $entered = Branch::create($data);            
            $message = trans('филиал успешно добавлен!');
		}
		
		$entered->update($data);
        
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete()
    {
        if (request()->has('id')) {
			$item = Branch::find(request()->input('id'));
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('филиал успешно удален!')
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

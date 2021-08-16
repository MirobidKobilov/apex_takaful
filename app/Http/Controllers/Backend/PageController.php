<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.index');
    }

    public function data()
   	{
        $query = Page::query();
        return datatables()->of($query)
			->editColumn('img', function($item) {
				 if($item->img){
                    return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
                } else {
                    return "нет изображения";
                }
			})->rawColumns(['img'])
			->toJson();
   	}

    public function getForm($id = null)
   	{
   		$page = Page::find($id);
        if (!$page) $page = [];

        return view('backend.page.form', [
            'page' => $page,
            'id' => $id
        ]);
   	}

       public function postform($id = null) 
   	{       
        $data = request()->validate([
            'title_ru'       => 'required|max:255',
            'title_uz'       => 'nullable|max:255',
            'title_en'       => 'nullable|max:255',                   
            'text_ru'        => 'required',
            'text_uz'        => 'nullable',
            'text_en'  	     => 'nullable',
            'img'            => 'nullable|mimes:jpg,jpeg,png,svg|max:50000'
        ]);

   		if ($id == null) {
   			$page = page::create($data);
   			session()->flash('success', trans('статья успешно добавлена!'));
   		} else {
            $page = page::find($id);
            $page->update($data);
            session()->flash('success', trans('статья успешно обновлена!'));
		}

		if (request()->hasFile('img')){
            $data['img'] = request()->file('img')->store('pages/'.$page->id, ['disk' => 'public']);
        } else {
            // unset($data['img']);
            unset($data['img']);
		}

		$page->update($data);

   		return redirect()->route('backend.page.show');
   	}

   	public function delete()
   	{
   		if (request()->has('id')) {
            $item = Page::find(request()->input('id'));            
            if (Storage::disk('public')->exists($item->img)) {
                Storage::disk('public')->delete($item->img);
			}
            $item->delete();
   			$response = [
                'status' => 'success',
                'message' => trans('страница успешно удалена!')
            ]; 
   		} else {
   			$response = [
                'status' => 'error',
                'message' => 'Пожалуйста попробуйте снова'
            ];
   		}

   		return response()->json($response);
    }

    public function filemanager()
    {
        return view('backend.filemanager.index');
    }
}

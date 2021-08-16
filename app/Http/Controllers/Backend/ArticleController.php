<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Yajra\DataTables;


class ArticleController extends Controller
{
    public function index()
    {
        return view('backend.articles.index');
    }

    public function data()
    {
        $query = Article::query();
        return datatables()->of($query)
			->editColumn('img', function($item) {
				return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
			})->rawColumns(['img'])
			->toJson();
    }

    public function getform($id = null)
   	{
   		$articles = Article::find($id);
        if (!$articles) $articles = [];

        return view('backend.articles.form', [
            'articles' => $articles,
            'id' => $id
        ]);
   	}

   	public function postform($id = null) 
   	{       
        $data = request()->validate([
            'title_ru'       => 'required|max:255',
            'title_uz'       => 'nullable|max:255',
            'title_en'       => 'nullable|max:255',
            'short_text_ru'  => 'required|max:255',
            'short_text_uz'  => 'nullable|max:255',
            'short_text_en'  => 'nullable|max:255',                     
            'text_ru'        => 'required',
            'text_uz'        => 'nullable',
            'text_en'  	     => 'nullable',
            'published_at'   => 'required',
            'type'           => 'required',
            'img'            => 'nullable|mimes:jpg,jpeg,png|max:50000'
        ]);

   		if ($id == null) {
   			$articles = Article::create($data);
   			session()->flash('success', trans('статья успешно добавлена!'));
   		} else {
            $articles = Article::find($id);
            $articles->update($data);
            session()->flash('success', trans('статья успешно обновлена!'));
		}

		if (request()->hasFile('img')) {
            $data['img'] = request()->file('img')->store('articles/' . $articles->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
		}

		$articles->update($data);

   		return redirect()->route('backend.articles.show');
   	}

    public function delete()
    {
        if (request()->has('id')) {
			$item = Article::find(request()->input('id'));
			$image = public_path('storage/'.$item->img);
			if (Storage::disk('public')->exists($item->img)) {
				Storage::disk('public')->delete($item->img);
			}
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('статья успешно удалена!')
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
<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.products.index');
    }

    public function data()
    {
        $query = Product::query();
        return datatables()->of($query)
            ->editColumn('img', function ($item) {
                return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
            })->rawColumns(['img'])
            ->toJson();
    }

    public function getform($id = null)
   	{
   		$products = Product::find($id);
        if (!$products) $products = [];

        return view('backend.products.form', [
            'products' => $products,
            'id' => $id
        ]);
   	}

    public function postform($id = null)
    {
        $data = request()->validate([
            'title_ru'       => 'required|max:255',
            'title_uz'       => 'nullable|max:255',
            'title_en'       => 'nullable|max:255',
            'short_text_ru'  => 'required|max:500',
            'short_text_uz'  => 'nullable|max:500',
            'short_text_en'  => 'nullable|max:500',
            'description_ru' => 'required',
            'description_uz' => 'nullable',
            'description_en' => 'nullable',
            'img'            => 'nullable|mimes:jpg,jpeg,png,svg|max:50000',
            'type'           => 'required'
        ]);

        if ($id == null) {
            $products = Product::create($data);
            session()->flash('success', trans('продукт успешно добавлен!'));
        } else {
            $products = Product::find($id);
            $products->update($data);
            session()->flash('success', trans('продукт успешно обновлен!'));
        }

        if (request()->hasFile('img')) {
            $data['img'] = request()->file('img')->store('products/' . $products->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
        }

        $products->update($data);

        return redirect()->route('backend.products.show');
    }

    public function delete()
    {
        if (request()->has('id')) {
            $item = Product::find(request()->input('id'));
            $image = public_path('storage/' . $item->img);
            if (Storage::disk('public')->exists($item->img)) {
                Storage::disk('public')->delete($item->img);
            }
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('продукт успешно удален!')
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

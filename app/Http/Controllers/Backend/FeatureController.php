<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        return view('backend.features.index');
    }

    public function data()
    {
        $query = Feature::query();
        return datatables()->of($query)
            ->editColumn('img', function ($item) {
                return "<img src='/storage/$item->img' width='100px' class='mx-auto'/>";
            })->rawColumns(['img'])
            ->toJson();
    }

    public function getform($id = null)
   	{
   		$features = Feature::find($id);
        if (!$features) $features = [];

        return view('backend.features.form', [
            'features' => $features,
            'id' => $id
        ]);
   	}

    public function postform($id = null)
    {
        $data = request()->validate([
            'short_text_ru'  => 'required|max:255',
            'short_text_uz'  => 'nullable|max:255',
            'short_text_en'  => 'nullable|max:255',
            'img'            => 'required|mimes:jpg,jpeg,png|max:50000',
            'icon'           => 'nullable|mimes:jpg,jpeg,png,svg|max:50000'
        ]);

        if ($id == null) {
            $features = Feature::create($data);
            session()->flash('success', trans('особенность успешно добавлен!'));
        } else {
            $features = Feature::find($id);
            $features->update($data);
            session()->flash('success', trans('особенность успешно обновлен!'));
        }

        if (request()->hasFile('img')) {
            $data['img'] = request()->file('img')->store('features/' . $features->id, ['disk' => 'public']);
        } else {
            unset($data['img']);
        }
        if (request()->hasFile('icon')) {
            $data['icon'] = request()->file('icon')->store('features/' . $features->id, ['disk' => 'public']);
        } else {
            unset($data['icon']);
        }

        $features->update($data);

        return redirect()->route('backend.features.show');
    }

    public function delete()
    {
        if (request()->has('id')) {
            $item = Feature::find(request()->input('id'));
            $image = public_path('storage/' . $item->img);
            if (Storage::disk('public')->exists($item->img)) {
                Storage::disk('public')->delete($item->img);
            }
            $icon = public_path('storage/' . $item->icon);
            if (Storage::disk('public')->exists($item->icon)) {
                Storage::disk('public')->delete($item->icon);
            }
            $item->delete();
            $response = [
                'status' => 'success',
                'message' => trans('особенность успешно удален!')
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

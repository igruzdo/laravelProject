<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        
        return view('admin.categories.index', [
            'categoriesList' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => ['required', 'string', 'min:5']
        ]);
        $data = $request->only(['title', 'description']);

        $created = Category::create($data);

        if($created) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления данных')->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            "title" => ['required', 'string', 'min:5']
        ]);

        $data = $request->only(['title', 'description']);

        $updated = $category->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Ошибка обновления данных')->withInput();
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::paginate(5)
        ]);
    }


    public function create(Category $category)
    {
        return view('admin.category.create',[
            'category' => $category
        ]);
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $request->validated();

        $category->fill([
            'title' => $request->all()['title'],
            'slug' => Str::slug($request->all()['title']),
        ])->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория добавлена');
    }

    public function edit(Category $category)
    {
        return view('admin.category.create',[
            'category' => $category
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $request->flash();

        $category->fill([
            'title' => $request->all()['title'],
            'slug' => Str::slug($request->all()['title']),
        ])->save();

        return redirect()->route('admin.category.edit', $category)->with('success', 'Категория изменена');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Категория удалена');
        }catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('success', 'Категория не может быть удалена, т.к. в ней присутствуют новости');
        }

    }
}

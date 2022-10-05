<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.categories', [
            'category' => Category::all()
        ]);
    }

    public function showById(Category $category, News $news, int $id)
    {

        $category = Category::find($id);

        return view('news.category', [
            'category' => $category->title,
            'news' => $category->news
        ]);

    }

    public function showBySlug($slug)
    {
/*        $category = $category->getCategoryBySlug($slug);

        $news = $news->getNewsCategoryById($category['id'] ?? null);*/

        $category = Category::query()->where('slug', $slug)->first();
//        $news = $category->news;
//        dd($news->keyBy('id'));
//        $news = News::paginate(5);

        return view('news.category', [
            'category' => $category->title,
            'news' => $category->news
        ]);
    }
}

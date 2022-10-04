<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('news.categories', [
            'category' => $category->getCategories()
        ]);
    }

    public function showById(Category $category, News $news, int $id)
    {

        return view('news.category', [
            'category' => $category->getCategoryById($id),
            'news' => $news->getNewsCategoryById($id)
        ]);

    }

    public function showBySlug(Category $category, News $news, $slug)
    {
        $category = $category->getCategoryBySlug($slug);

        $news = $news->getNewsCategoryById($category['id'] ?? null);

        return view('news.category', [
            'category' => $category,
            'news' => $news
        ]);
    }
}

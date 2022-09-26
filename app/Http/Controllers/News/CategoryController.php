<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category): string
    {
        $category = $category->getCategories();

        return view('news.category.index', [
            'category' => $category
        ]);
    }

    public function show(Category $category, News $news, $id): string
    {
        $category = $category->getCategoryById($id);

        if(is_null($category)) {
            return view('404');
        }

        $news = $news->getNewsCategoryById($id);
        return view('news.category.single', [
            'category' => $category,
            'news' => $news
        ]);
    }

    public function showBySlug(Category $category, News $news, $slug): string
    {
        $category = $category->getCategoryBySlug($slug);

        if(is_null($category)) {
            return view('404');
        }

        $news = $news->getNewsCategoryById($category['id']);

        return view('news.category.single', [
            'category' => $category,
            'news' => $news
        ]);
    }
}

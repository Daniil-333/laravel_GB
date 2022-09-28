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

        try {
            $category = $category->getCategoryById($id);

            $news = $news->getNewsCategoryById($id);

            return view('news.category.single', [
                'category' => $category,
                'news' => $news
            ]);
        }catch (\Exception $e) {
            return view('404');

        }
    }

    public function showBySlug(Category $category, News $news, $slug): string
    {

        try {
            $category = $category->getCategoryBySlug($slug);

            $news = $news->getNewsCategoryById($category['id']);

            return view('news.category.single', [
                'category' => $category,
                'news' => $news
            ]);

        }catch (\Exception $e) {
            return view('404');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function create(Request $request, Category $category, News $news)
    {
        if($request->isMethod('post')) {

            $newsArr = $news->getNews();
            $idNews = count($newsArr) + 1;

            $newsArr[] = [
                'id' => $idNews,
                'title' => $request->except('_token')['name'],
                'description' => $request->except('_token')['desc'],
                'slug' => Str::slug($request->except('_token')['name']),
                'category_id' => (int)$request->except('_token')['category'],
                'isPrivate' => array_key_exists('isPrivate', $request->except('_token')),
            ];
            $news->setNews($newsArr);
            return redirect()->route('news.show', $idNews);

//            $request->flash();
//            return redirect()->route('admin.news.create');
//            dd($request->except('_token'));
        }
        return view('admin.news.create', [
            'categories' => $category->getCategories()
        ]);
    }
}

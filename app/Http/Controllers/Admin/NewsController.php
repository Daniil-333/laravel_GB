<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function create(Request $request, Category $category, News $news)
    {
        if($request->isMethod('post')) {

            $arr = $request->except('_token');
            $newsArr = $news->getNews();

            if($request->file('image')) {
                $path = Storage::putFile('public/img', $request->file('image'));
                $url = Storage::url($path);
            }

            $newsArr[] = [
                'title' => $arr['name'],
                'description' => $arr['desc'],
                'slug' => Str::slug($arr['name']),
                'category_id' => (int)$arr['category'],
                'isPrivate' => isset($arr['isPrivate']),
                'image' => $url ?? null,
            ];
            $newsArr[array_key_last($newsArr)]['id'] = array_key_last($newsArr);
            $news->setNews($newsArr);
            return redirect()->route('news.show', array_key_last($newsArr));

//            $request->flash();
//            return redirect()->route('admin.news.create');
//            dd($request->except('_token'));
        }
        return view('admin.news.create', [
            'categories' => $category->getCategories()
        ]);
    }
}

<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(News $news): string
    {
        $news = $news->getNews();
        return view('news.index', [
            'news' => $news
        ]);
    }

    public function show(News $news, $id): string
    {
        try {
            $news = $news->getNewsById($id);

            return view('news.single', [
                'item' => $news
            ]);
        }catch (\Exception $e) {
            return view('404');
        }
    }
}

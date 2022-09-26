<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
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
        $news = $news->getNewsById($id);
        if(is_null($news)) {
            return view('404');
        }
        return view('news.single', [
            'item' => $news
        ]);
    }
}

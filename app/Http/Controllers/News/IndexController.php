<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(News $news)
    {
        return view('news.index', [
            'news' => $news->getNews()
        ]);
    }

    public function show(News $news, $id)
    {
        return view('news.one', [
            'item' => $news->getNewsById($id)
        ]);
    }
}

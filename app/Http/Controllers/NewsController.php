<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): string
    {
        $news = News::getNews();
        return view('news', [
            'news' => $news
        ]);
    }

    //TODO если ID не сущевтвует?
    public function show($id): string
    {
        $news = News::getNewsId($id);
        return view('news_single', [
            'item' => $news
        ]);
    }
}

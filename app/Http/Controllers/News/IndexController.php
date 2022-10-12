<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        //$news = DB::select('SELECT * FROM `news` WHERE 1');
        //$news = DB::table('news')->get(); //getAll


        //$news = News::simplePaginate(5);
        $news = News::paginate(5);
        return view('news.index', [
            'news' => News::all()
        ]);
    }

    public function show($id)
    {
        //$news = DB::select('SELECT * FROM `news` WHERE id = :id', ['id' => $id]);
        //$news = DB::table('news')->find($id); //getOne($id)
        return view('news.one', [
            'item' => News::find($id)
        ]);
    }
}

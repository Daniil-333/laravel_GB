<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'news' => News::query()
                ->orderBy('created_at', 'DESC')
                ->paginate(6)
        ]);
    }

    public function create(News $news)
    {
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(NewsRequest $request, News $news)
    {

        $request->validated();

        if($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url ?? null;
        $news->fill($request->all())->save();

        return redirect()->route('news.show', $news->id);
    }

    public function update(NewsRequest $request, News $news) {

        $request->validated();

        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url ?? null;
        $news->fill($request->all())->save();

        return redirect()->route('news.show', $news->id);
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index');
    }

    public function edit(News $news) {

        return view('admin.news.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }
}

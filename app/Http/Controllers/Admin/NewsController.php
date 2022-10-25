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

        $news->fill($request->all());
        $news->image = $url ?? null;

        $news->save();

        return redirect()->route('news.show', $news->id)->with('success', 'Новость добавлена');
    }

    public function update(NewsRequest $request, News $news)
    {
        $request->validated();
        $isPrivate = array_key_exists('isPrivate', $request->all());

        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->fill($request->all());
        $news->image = $url ?? null;
        $news->isPrivate = $isPrivate;

        $news->save();

        return redirect()->route('news.show', $news->id);
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

    public function edit(News $news) {

        return view('admin.news.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }
}

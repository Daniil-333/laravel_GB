<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'news' => News::paginate(5)
        ]);
    }

    public function create(News $news)
    {
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->flash();

        if($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news = new News();
        $news->image = $url ?? null;
        $news->fill($request->all())->save();

        return redirect()->route('news.show', $news->id);

        /*            $data = [
                        'title' => $request->title,
                        'description' => $request->description,
                        'isPrivate' => isset($request->isPrivate),
                        'image' => $url ?? null,
                        'category_id' => (int)$request->category,
                    ];

                    $id = DB::table('news')->insertGetId($data);
                    return redirect()->route('news.show', $id);*/
        /*            $newsArr[] = [
                        'title' => $arr['name'],
                        'description' => $arr['desc'],
                        'slug' => Str::slug($arr['name']),
                        'category_id' => (int)$arr['category'],
                        'isPrivate' => isset($arr['isPrivate']),
                        'image' => $url ?? null,
                    ];
                    $newsArr[array_key_last($newsArr)]['id'] = array_key_last($newsArr);
                    $news->setNews($newsArr);
                    return redirect()->route('news.show', array_key_last($newsArr));*/
    }

    public function update(Request $request, News $news) {
        $request->flash();

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

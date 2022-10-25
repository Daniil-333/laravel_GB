<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{

    public function test1()
    {
        return response()->download('1.jpg');
    }

    public function test2(Request $request, News $news)
    {

        if($request->isMethod('post')) {
            $request->flash();
            if(!isset($request->all()['typeData'])) {
                return redirect()->route('admin.test2');
            }else {

                if($request->all()['typeData'] === 'json') {
                    return response()
                        ->json(News::query()->where('category_id', '=', (int)$request->all()['category'])->get()->toArray())
                        ->header('Content-Disposition', 'attachment; filename = "json.txt"')
                        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                }else {
                    return Excel::download(new NewsExport, 'news.xlsx');
                }
            }
        }

        return view('admin.test2', [
            'categories' => Category::all()
        ]);
    }
}

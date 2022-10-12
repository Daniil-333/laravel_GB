<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $sources = [
            'https://lenta.ru/rss',
            'https://www.gazeta.ru/export/rss/first.xml'
        ];

        foreach ($sources as $source) {
            $xml = XmlParser::load($source);
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
            ]);

            foreach($data['news'] as $news) {
                $datePublic = (new DateTime($news['pubDate']))->format('Y-m-d H:i:s');

                if(News::query()->where('created_at', '=', $datePublic)->count() != 0) {
                    continue;
                }

                if(is_null($news['title']) || is_null($news['description'])) {
                    continue;
                }

                $slugCategory = Str::slug($news['category']);
                Category::query()->firstOrCreate([
                    'title' => $news['category'],
                    'slug' => $slugCategory,
                ]);

                $categoryID = Category::query()
                    ->where('slug', '=', $slugCategory)
                    ->first()->id;

                News::query()->firstOrCreate([
                    'title' => $news['title'],
                    'description' => $news['description'],
                    'isPrivate' => random_int(0, 1),
                    'image' => $news["enclosure::url"],
                    'created_at' => $datePublic,
                    'updated_at' => $datePublic,
                    'category_id' => $categoryID,
                ]);
                /*            Получить категорию (с ID)
                            При необходимости добавить категорию в БД
                            Получить новость
                            Добавить ID категории в новость
                            help News::query()->firstOnCreate([])*/
            }
        }


        return redirect()->route('admin.index');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    //protected $table = 'my_news';
    //protected $primaryKey = 'news_id';
    //public $timestamps = false;
    use HasFactory;


    protected $fillable = ['title', 'description', 'isPrivate', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    /*private $news = [
      1 => [
          'id' => 1,
          'title' => 'Новость 1',
          'description' => 'Текст новости 1',
          'slug' => 'novost-1',
          'category_id' => 3,
          'isPrivate' => false,
      ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'description' => 'Текст новости 2',
            'slug' => 'novost-2',
            'category_id' => 2,
            'isPrivate' => false,
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'description' => 'Текст новости 3',
            'slug' => 'novost-3',
            'category_id' => 1,
            'isPrivate' => true,
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'description' => 'Текст новости 4',
            'slug' => 'novost-4',
            'category_id' => 2,
            'isPrivate' => true,
        ],
        5 => [
            'id' => 5,
            'title' => 'Новость 5',
            'description' => 'Текст новости 5',
            'slug' => 'novost-5',
            'category_id' => 1,
            'isPrivate' => false,
        ],
        6 => [
            'id' => 6,
            'title' => 'Новость 6',
            'description' => 'Текст новости 6',
            'slug' => 'novost-6',
            'category_id' => 3,
            'isPrivate' => true,
        ],
    ];

    public static function all()
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    public function getNews()
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);

//        return $this->news;
    }

    public function setNews($news)
    {
        Storage::disk('local')->put('news.json', json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function getNewsById($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return $this->getNews()[$id];
        }
        return null;
    }

    public function getNewsCategoryById($id): ?array
    {
        $news = [];
        foreach ($this->getNews() as $item) {
            if($item['category_id'] === $id) {
                $news[] = $item;
            }
        }
        return $news;
    }*/
}

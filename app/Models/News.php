<?php


namespace App\Models;


class News
{
    private static $news = [
      [
          'id' => 1,
          'title' => 'Новость 1',
          'description' => 'Текст новости 1',
          'slug' => '',
          'category_id' => ''
      ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'description' => 'Текст новости 2',
            'slug' => '',
            'category_id' => ''
        ]
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id): ?array
    {
        foreach (static::getNews() as $news) {
            if($news['id'] ==$id) {
                return $news;
            }
        }
        return null;
    }
}

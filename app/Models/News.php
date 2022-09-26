<?php


namespace App\Models;


class News
{
    private $news = [
      1 => [
          'id' => 1,
          'title' => 'Новость 1',
          'description' => 'Текст новости 1',
          'slug' => '',
          'category_id' => '3'
      ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'description' => 'Текст новости 2',
            'slug' => '',
            'category_id' => '2'
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'description' => 'Текст новости 3',
            'slug' => '',
            'category_id' => '1'
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'description' => 'Текст новости 4',
            'slug' => '',
            'category_id' => '2'
        ],
        5 => [
            'id' => 5,
            'title' => 'Новость 5',
            'description' => 'Текст новости 5',
            'slug' => '',
            'category_id' => '1'
        ],
        6 => [
            'id' => 6,
            'title' => 'Новость 6',
            'description' => 'Текст новости 6',
            'slug' => '',
            'category_id' => '3'
        ],
    ];

    public function getNews()
    {
        return $this->news;
    }

    public function getNewsById($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return $this->news[$id];
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
    }
}

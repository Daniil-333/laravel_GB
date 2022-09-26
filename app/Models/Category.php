<?php


namespace App\Models;


class Category
{
    private $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => ''
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => ''
        ],
        3 => [
            'id' => 3,
            'title' => 'Животные',
            'slug' => ''
        ]
    ];

    public function getCategories()
    {
        return $this->categories;
    }

    public function getCategoryById($id): ?array
    {
        if (array_key_exists($id, $this->getCategories())) {

            return $this->categories[$id];
        }
        return null;
    }
}

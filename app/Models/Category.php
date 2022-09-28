<?php

namespace App\Models;


class Category
{
    private $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politika'
        ],
        3 => [
            'id' => 3,
            'title' => 'Животные',
            'slug' => 'zivotnye'
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

    public function getCategoryBySlug($slug): ?array
    {
        foreach ($this->getCategories() as $key => $category) {

            if($category['slug'] === $slug) {
                return $this->categories[$key];
            }
        }
        return null;
    }
}

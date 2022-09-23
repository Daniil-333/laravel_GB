<?php


namespace App\Models;


class Category
{
    private static $categories = [
        [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => ''
        ],
        [
            'id' => 2,
            'title' => 'Политика',
            'slug' => ''
        ]
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryId($id): ?array
    {
        foreach (static::getCategories() as $category) {
            if($category['id'] ==$id) {
                return $category;
            }
        }
        return null;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function news() {
        return $this->hasMany(News::class);
    }
    /*private $categories = [
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
        return json_decode(Storage::disk('local')->get('categories.json'), true);

//        return $this->categories;
    }

    public function setCategories($categories)
    {
        Storage::disk('local')->put('categories.json', json_encode($categories, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
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
    }*/
}

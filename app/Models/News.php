<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
/*    //protected $table = 'my_news';
    //protected $primaryKey = 'news_id';
    //public $timestamps = false;*/
    use HasFactory;


    protected $fillable = ['title', 'description', 'isPrivate', 'image', 'created_at', 'updated_at', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

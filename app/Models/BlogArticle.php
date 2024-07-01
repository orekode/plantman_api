<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_article_categories', 'article_id', 'category_id');
    }
}

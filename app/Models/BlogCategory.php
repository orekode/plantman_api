<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function article()
    {
        return $this->belongsToMany(BlogArticle::class, 'blog_article_categories', 'category_id', 'article_id');
    }
}

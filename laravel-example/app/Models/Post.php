<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "posts";

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'published_at',
        'cover_image',
        'tags',
        'meta'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'tags' => 'array',
        'meta' => 'array',
        'published_at' => 'datetime',
        'deleted_at'   => 'datetime',
    ];

    public function categories()
    {
        // Tabla pivote post_category
        return $this->belongsToMany(Category::class)->using(CategoryPost::class)->withTimestamps();
    }
}
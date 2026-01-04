<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'topic_id',
        'author_id',
        'image',
        'body',
    ];
    protected $with = ['topic', 'author'];
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeFilter(Builder $query): void
    {
        if (request('topic')) {
            $query->whereHas('topic', function ($query) {
                $query->where('slug', request('topic'));
            });
        }

        if (request('author')) {
            $query->whereHas('author', function ($query) {
                $query->where('username', request('author'));
            });
        }
    }
}

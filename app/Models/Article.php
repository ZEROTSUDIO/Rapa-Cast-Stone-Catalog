<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'status',
    ];

    protected $with = ['topic', 'author'];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => ArticleStatus::class,
        ];
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('status', ArticleStatus::Published);
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

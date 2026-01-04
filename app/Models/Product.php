<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'image',
        'description',
        'specification',
        'is_featured',
    ];
    protected $with = ['category'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $casts = [
        'specification' => 'array',
    ];
    public function scopeFilter(Builder $query): void
    {
        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
        if (request('category')) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', request('category'));
            });
        }
    }
}

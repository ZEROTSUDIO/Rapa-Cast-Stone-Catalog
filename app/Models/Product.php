<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'code',
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
    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn() => $this->image ? asset('images/' . $this->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=800');
    }
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

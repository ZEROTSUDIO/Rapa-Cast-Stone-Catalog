<?php

use App\Models\Article;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    return view('front.home', ['categories' => $categories, 'title' => 'Homepage']);
});

Route::get('/home', function () {
    return view('front.home', ['title' => 'Homepage']);
});

Route::get('/about', function () {
    return view('front.about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('front.contact', ['title' => 'Contact Us']);
});

// Route::get('/topics/{topic:slug}', function (Topic $topic) {
//     return view('front.articles.index', ['title' => 'Articles in' . $topic->name, 'articles' => $topic->articles]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('front.articles.index', ['title' => 'Articles in' . $author->name, 'articles' => $author->articles]);
// });

Route::get('/articles', function () {
    return view('front.articles.index', [
        'articles' => Article::filter(request(['topic', 'author']))
            ->latest()
            ->paginate(6)
            ->withQueryString(),
        'topics' => Topic::all(),
    ]);
});

Route::get('/articles/{article:slug}', function (Article $article) {
    return view('front.articles.show', ['article' => $article]);
});

Route::get('/catalogs', function () {
    return view('front.catalog.index', [
        'catalogs' => Product::filter(request(['search', 'category']))
            ->latest()
            ->paginate(9)->withQueryString(),
        'categories' => Category::all()
    ]);
});

Route::get('/catalogs/{category:slug}/{product:slug}', function (Category $category, Product $product) {
    return view('front.catalog.show', ['catalog' => $product, 'categories' => $category->products]);
});

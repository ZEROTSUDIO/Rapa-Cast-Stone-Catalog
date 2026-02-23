<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::has('products')->get();
    $featuredProducts = Product::where('is_featured', true)->take(3)->get();

    return view('front.home', [
        'categories' => $categories,
        'featuredProducts' => $featuredProducts,
        'title' => 'Homepage',
    ]);
});

// Route::get('/home', function () {
//     return view('front.home', ['title' => 'Homepage']);
// });

Route::get('/about', function () {
    return view('front.about', ['title' => 'About Us']);
});

Route::get('/contact', function () {
    return view('front.contact', ['title' => 'Contact Us']);
});
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

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
        'categories' => Category::has('products')->get(),
    ]);
});

Route::get('/catalogs/{category:slug}/{product:slug}', function (Category $category, Product $product) {
    return view('front.catalog.show', ['catalog' => $product, 'categories' => $category->products]);
})->name('catalog.show');

Route::get('/sitemap.xml', function () {
    $products = Product::with('category')->get();
    $articles = Article::all();

    return response()
        ->view('front.sitemap', compact('products', 'articles'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

use App\Http\Controllers\AdminAuthController;

Route::middleware(['guest', 'throttle:login'])->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('login');
    Route::post('/admin/login', [AdminAuthController::class, 'store']);
});

Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])->name('logout');
Route::get('/admin/logout', [AdminAuthController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin');
    // Route::get('/admin/catalogues', function () {
    //     return view('admin.catalogue');
    // })->name('admin.catalogue');
    Route::get('admin/catalogues', function () {
        return view('admin.catalogue');
    })->name('admin.catalogues');
    // Route::get('admin/catalogues/add', function () {
    //     return view('admin.add-catalogue');
    // })->name('admin.add-catalogue');
    Route::get('admin/categories', function () {
        return view('admin.categories');
    })->name('admin.categories');
    Route::get('admin/messages', function () {
        return view('admin.contact');
    })->name('admin.messages');
    Route::get('admin/articles', function () {
        return view('admin.article');
    })->name('admin.articles');
    Route::get('admin/topics', function () {
        return view('admin.topic');
    })->name('admin.topics');
});

// Utility route to move storage files to public folder (since symlink is disabled)
// use Illuminate\Support\Facades\File;

Route::get('/__link-storage', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');

    if (file_exists($link)) {
        return 'storage link already exists';
    }

    symlink($target, $link);

    return 'storage link created';
});

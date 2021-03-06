<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes/Router: An overview of all the webpages and their controller pages

// Authentication routes
Auth::routes();

// Homepage
Route::get('/', 'BlogController@index')->name('home');
Route::get('/articles', 'ArticlesController@home');

// Page of specific blog
Route::get('/blogs/{blog}', 'BlogController@show');

// Pages to create and store a new blog
Route::post('/blogs', 'BlogController@store');

// Pages to create a category
Route::get('/articles/createcategory', 'CategoriesController@create');
Route::post('/articles/createcategory', 'CategoriesController@store');

// The overview page with all blogs
Route::get('/articles/blogs', 'ArticlesController@blogs');

// The page to find all categories
Route::get('/articles/categories', 'ArticlesController@categories');

// Pages to create and store a new article
Route::get('/articles/create', 'ArticlesController@create');
Route::post('/articles', 'ArticlesController@store');

// Pages to take a look at or create a new event
Route::get('/event', 'EventController@index');
Route::get('/event/create', 'EventController@create');
Route::post('/event/create', 'EventController@store');

// Page of specific article
Route::get('/articles/{article}', 'ArticlesController@show');

// Page to create and store a new rating
Route::post('/articles/{article}/ratings', 'RatingsController@store');

// Page to create and store a new comment
Route::post('/articles/{article}/comments', 'CommentsController@store');

// Page to find all articles of selected category
Route::get('/articles/categories/{category}', 'CategoriesController@home');

// Page for the Paywall
Route::post('/paywall', 'PaywallController@store');

// Page to admin page
Route::get('/owner/owner', 'AdminController@home');

// Pages to make backup or excell file
Route::get('/owner/owner/backup', 'AdminController@backup');
Route::get('/owner/owner/sepatool', 'PaywallController@excell');
Route::get('/owner/owner/all_bank_data', 'PaywallController@excell_ALL');

// Page to download invoice
Route::get('/download/{file}', 'DownloadsController@download');

// See the statistics
Route::get('/owner/stats', 'StatsController@show');

// Get the sitemaps
Route::get('/sitemap', 'SitemapController@index');
Route::get('/sitemap/articles', 'SitemapController@articles');
Route::get('/sitemap/categories', 'SitemapController@categories');
Route::get('/sitemap/blogs', 'SitemapController@blogs');

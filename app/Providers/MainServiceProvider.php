<?php

namespace App\Providers;

use App\Actions\User\PostActions;
use App\Models\Category;
use App\Models\Visitors;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            $categories = Category::all();
            $most_view_posts = PostActions::most_view_posts();
            $recent_posts = PostActions::recent_posts();
            $popular_posts = PostActions::popular_posts();
            $data = [
                'most_view_posts' => $most_view_posts,
                'categories' => $categories,
                'recent_posts' => $recent_posts,
                'popular_posts' => $popular_posts,
            ];
            $view->with('data', $data);
        });
    }
}

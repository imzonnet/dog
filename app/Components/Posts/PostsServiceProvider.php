<?php namespace App\Components\Posts;

use App\Components\Posts\Repositories\CategoryRepository;
use App\Components\Posts\Repositories\EloquentCategoryRepository;
use App\Components\Posts\Repositories\EloquentPostRepository;
use App\Components\Posts\Repositories\PostRepository;
use App\Components\TraitServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class PostsServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components\Posts\Http\Controllers';

    protected $component = 'Posts';

    use TraitServiceProvider;

    public function register()
    {
        /**
         * Repositories
         */
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
    }

    /**
     * Register Roles & Permission for Component
     *
     * If you want change permission name to other name.
     * You should remove old permission name with function permissionsDrop()
     * private function dropPermissions() {
     *      return ['old_name1', 'old_name2'];
     * }
     *
     * return array Permission name
     */
    private function listPermissions() {
        return ['post', 'page'];
    }
}
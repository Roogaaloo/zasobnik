<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

        $name = config('project');

        view()->composer('*', function ($view) {
            $view->adminMenu = $this->createAdminMenu();
        });

    }

    private function createAdminMenu() {
        $adminMenu = ([
            'dashboard' => [
                'title' => 'Dashboard',
                'route' => 'admin.template.home',
            ],
            'pages' => [
                'title' => 'Stránky',
                'route' => 'admin.pages.index',
            ],
            'products' => [
                'title' => 'Produkty',
                'route' => 'admin.products.index',
            ],
            'blog' => [
                'title' => 'Blog',
                'route' => 'admin.blog.index',
            ],
            'banner' => [
                'title' => 'Banner',
                'route' => 'admin.banner.index',
            ],
            'menu' => [
                'title' => 'Menu',
                'route' => 'admin.menu.index',
            ],
            'users' => [
                'title' => 'Uživatelé',
                'route' => 'admin.users.index',
            ],
        ]);

        return $adminMenu;
    }

    public function index(){
        return view('admin.template.home');
    }
}

<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $prefix    = '';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {

        $this->mapWebRoute($router);

        $this->mapPartnerRoute($router);

    }

    public function mapWebRoute(Router $router)
    {
        $router->group(['namespace' => $this->namespace, 'middleware' => ['web']], function ($router) {
            require app_path('Http/Routes/routes.php');
            require app_path('Http/Routes/user.php');       //用户相关路由
            require app_path('Http/Routes/admin.php');      //后台相关路由
        });
    }

    public function mapPartnerRoute(Router $router)
    {
        $partners = ['jinzhuotao','liqinglin','yanzhenhao', 'yangfan','songlihui'];

        $requestUri = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : '';
        $left = substr($requestUri,strpos($requestUri,'/')+1);
        $partnerName = strpos($left,'/') ? substr($left,0,strpos($left,'/')) : $left;

        if(in_array($partnerName,$partners)){

            $this->prefix = $partnerName;

            $router->group(['namespace' => $this->namespace], function ($router) {
                require app_path('Http/Routes/partners.php');
            });
        }
    }
}

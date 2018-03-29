<?php
Route::group(['namespace' => 'User'], function ($router) {

    $router->get('/', function () {
        if(view()->exists("users.$this->prefix")){
            return view("users.$this->prefix");
        }
        abort(404,'该用户暂未开发');
    });

});

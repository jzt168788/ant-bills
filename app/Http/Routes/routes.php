<?php

Route::get('/',  function () {
    return view('index');
});

Route::get('/picture/{name}/{path}', 'Picture\OssPictureController@showPicture');
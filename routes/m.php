<?php
Route::group(['namespace' => 'Mobile',''],function (){
    Route::get('/','MobileController@index')->name('mobile.home');
    Route::post('/file/post','HomeController@filePost')->name('home.file.post');

    Route::get('/contribute','MobileController@contribute')->name('mobile.contribute');
    Route::get('/pre/contribute','MobileController@preContribute')->name('mobile.pre.contribute');

    Route::post('/contribute/post', 'MobileController@contributePost')->name('mobile.contribute.post');


    Route::group(['prefix' => '/periodical'],function () {
        Route::get('/','MobileController@periodicalList')->name('mobile.periodical');
        Route::get('/list', 'MobileController@periodicalList')->name('mobile.periodical.list');
        Route::get('content/{unique}', 'MobileController@periodicalContent')->name('mobile.periodical.content');
    });

    Route::group(['prefix' => '/paper'],function () {
        Route::get('list', 'MobileController@paperList')->name('mobile.paper.list');
        Route::get('content/{id}', 'MobileController@paperContent')->name('mobile.paper.content');
    });

    Route::get('/page/{unique}','MobileController@page')->name('mobile.page');


});

?>
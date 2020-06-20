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


Route::group(['prefix'  =>  '/admin','namespace' => 'Admin' ], function(){
    Route::get('/login','LoginController@index')->name('admin.login');
    Route::post('/check','LoginController@checkLogin')->name('admin.check');
});


Route::group(['prefix' => '/admin', 'middleware' => 'auth:admin','namespace' => 'Admin'],function (){
    Route::get('','HomeController@getIndex')->name('admin');
    Route::get('/home','HomeController@getIndex')->name('admin.home');
    Route::get('/logout','AdminController@logout')->name('admin.logout');

    Route::group(['prefix' => '/user'],function (){
        Route::get('/info','AdminController@getUserInfo')->name('admin.user.info');
        Route::post('/update/password','AdminController@updateUserPassword')->name('admin.user.updatePassword');
        Route::post('/update/head_img','AdminController@updateUserInfo')->name('admin.user.updateHeadImg');
    });

    Route::group(['prefix' => '/setting'],function (){
        Route::get('/','SettingController@getIndex')->name('admin.setting');
        Route::get('/editor/{id}','SettingController@getEditor')->name('admin.setting.update');
        Route::post('/store','SettingController@postStore')->name('admin.setting.store');
    });

    Route::group(['prefix' => '/news'],function (){
        Route::get('/','NewsController@getIndex')->name('admin.news');
        Route::get('/editor','NewsController@getEditor')->name('admin.news.editor');
        Route::post('/store','NewsController@postStore')->name('admin.news.store');
        Route::get('/delete','NewsController@delete')->name('admin.news.delete');
    });

    Route::group(['prefix' => '/employ'],function (){
        Route::get('/','EmployController@getIndex')->name('admin.employ');
        Route::get('/editor','EmployController@getEditor')->name('admin.employ.editor');
        Route::post('/store','EmployController@postStore')->name('admin.employ.store');
        Route::get('/delete','EmployController@delete')->name('admin.employ.delete');
    });

    Route::group(['prefix' => '/covers'],function (){
        Route::post('/store','PeriodicalController@coversStore')->name('admin.periodical.covers.store');
        Route::any('/delete','PeriodicalController@coversDelete')->name('admin.periodical.covers.delete');
    });

    Route::group(['prefix' => '/periodical'],function (){
        Route::get('/','PeriodicalController@getIndex')->name('admin.periodical');
        Route::get('/editor','PeriodicalController@getEditor')->name('admin.periodical.editor');
        Route::post('/store','PeriodicalController@postStore')->name('admin.periodical.store');
        Route::get('/delete','PeriodicalController@delete')->name('admin.periodical.delete');

        Route::get('/covers/{id}','PeriodicalController@getCovers')->name('admin.periodical.covers');


        Route::get('/type','PeriodicalTypeController@getIndex')->name('admin.periodical.type');
        Route::get('/type/editor','PeriodicalTypeController@getEditor')->name('admin.periodical.typeEditor');
        Route::post('/type/store','PeriodicalTypeController@postStore')->name('admin.periodical.typeStore');
        Route::get('/type/delete','PeriodicalTypeController@delete')->name('admin.periodical.typeDelete');

    });

    Route::group(['prefix' => '/paper'],function (){
        Route::get('/','PaperController@getIndex')->name('admin.paper');
        Route::get('/editor','PaperController@getEditor')->name('admin.paper.editor');
        Route::post('/store','PaperController@postStore')->name('admin.paper.store');
        Route::get('/delete','PaperController@delete')->name('admin.paper.delete');
    });

    Route::group(['prefix' => '/page'],function (){
        Route::get('/','PageController@getIndex')->name('admin.page');
        Route::get('/editor','PageController@getEditor')->name('admin.page.editor');
        Route::post('/store','PageController@postStore')->name('admin.page.store');
        Route::get('/delete','PageController@delete')->name('admin.page.delete');
    });

    Route::group(['prefix' => '/contribute'],function (){
        Route::get('/','ContributeController@getIndex')->name('admin.contribute');
        Route::get('/editor','ContributeController@getEditor')->name('admin.contribute.editor');
        Route::post('/store','ContributeController@postStore')->name('admin.contribute.store');
        Route::get('/delete','ContributeController@delete')->name('admin.contribute.delete');
        Route::get('/download/file/{contribute_id}','ContributeController@downloadFile')->name('admin.contribute.download.file');
    });
});

Route::group(['prefix' => '/file',], function () {
    Route::post('/upload/{type}', 'FileController@postUpload')->name('file.upload');
});


Route::group(['namespace' => 'Front'],function (){
    Route::get('/','HomeController@home')->name('home');

    Route::get('/news','HomeController@news')->name('home.news');
    Route::get('/news/content','HomeController@newsContent')->name('home.news.content');

    Route::get('/paper','HomeController@paper')->name('home.paper');
    Route::get('/paper/content','HomeController@paperContent')->name('home.paper.content');

    Route::get('/info/{name}','HomeController@info')->name('home.info');
    Route::get('/validate','HomeController@perValidate')->name('home.validate');

    Route::get('/contribute','HomeController@contribute')->name('home.contribute');


    Route::post('/file/post','HomeController@filePost')->name('home.file.post');
    Route::post('/contribute/post','HomeController@contributePost')->name('home.contribute.post');

    Route::get('/employ/query','HomeController@employQuery')->name('home.query');


    Route::group(['prefix' => '/periodical'],function (){
        Route::get('/','HomeController@periodical')->name('home.periodical');
        Route::get('/{unique}','HomeController@periodicalContent')->name('home.periodical.content');

        Route::get('/{unique}/introduction','HomeController@periodicalIntroduction')->name('home.periodical.introduction');
        Route::get('/{unique}/page/{page}','HomeController@periodicalInfo')->name('home.periodical.info');

        Route::get('/{unique}/contribute','HomeController@periodicalContribute')->name('home.periodical.contribute');

        Route::get('/{unique}/news/{news_id}','HomeController@periodicalNewsContent')->name('home.periodical.news.content');
        Route::get('/{unique}/news','HomeController@periodicalNews')->name('home.periodical.news');

        Route::get('/{unique}/paper/{paper_id}','HomeController@periodicalPaperContent')->name('home.periodical.paper.content');
        Route::get('/{unique}/paper','HomeController@periodicalPaper')->name('home.periodical.paper');

        Route::get('/{unique}/concat','HomeController@periodicalConcat')->name('home.periodical.concat');

        Route::get('/{unique}/employ/list','HomeController@periodicalEmployList')->name('front.periodical.employ_list');

        Route::get('/{unique}/employ/query','HomeController@periodicalEmployQuery')->name('home.employ.query');

    });
});

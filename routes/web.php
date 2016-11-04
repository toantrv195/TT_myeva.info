<?php

Route::get('/', 'HomeController@index');

//category
Route::get('category/{alias}', ['as'=>'catetory', 'uses'=>'HomeController@getcate']);

//detail
Route::get('detail/{id}/{namealias}', ['as'=>'detail', 'uses'=>'HomeController@getdetail']);

//search
Route::post('search', ['as'=>'search', 'uses'=>'HomeController@getsearch']);

//contact
Route::post('contact', ['as' => 'postcontact', 'uses' => 'HomeController@postcontact']);

//export
ROute::get('export', 'ExcelController@getexport');

//login
Route::post('admin/register', 'Auth\RegisterController@register');
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm');
Route::get('admin/login', ['as'=> 'getlogin', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('admin/login', ['as'=> 'postlogin','uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('language/{locale}', ['as' => 'language', 'uses' => 'Controller@getlanguage']);

    //home
    Route::get('home', ['as' => 'homeadmin', 'uses' => 'Usercontroller@gethome']);

    //user
    Route::group(['prefix' => 'user'],function(){
        Route::get('list',['as' => 'admin.user.list', 'uses' => 'Usercontroller@getlist']);
        Route::get('add',['as' => 'admin.user.getadd', 'uses' => 'Usercontroller@getadd']);
        Route::post('add',['as' => 'admin.user.postadd', 'uses' => 'UserController@postadd']);
        Route::get('delete/{id}', ['as' =>'admin.user.delete', 'uses' => 'Usercontroller@getdelete']);
        Route::get('edit/{id}', ['as' => 'admin.user.getedit', 'uses' => 'Usercontroller@getedit']);
        Route::post('edit/{id}', ['as' => 'admin.user.postedit', 'uses' => 'Usercontroller@postedit']);
    });

    //category
    Route::group(['prefix'=>'category'],function(){
        Route::get('list', ['as' => 'admin.cate.list', 'uses' => 'CateController@getlist']);
        Route::get('add', ['as' => 'admin.cate.getadd', 'uses' => 'CateController@getadd']);
        Route::post('add', ['as' => 'admin.cate.postadd', 'uses' => 'CateController@postadd']);
        Route::get('delete/{id}', ['as' => 'admin.cate.delete', 'uses' => 'CateController@getdelete']);
        Route::get('edit/{id}', ['as' => 'admin.cate.getedit', 'uses' => 'CateController@getedit']);
        Route::post('edit/{id}', ['as' => 'admin.cate.postedit', 'uses' => 'CateController@postedit']);
    });

    //article
    Route::group(['prefix' => 'article'], function(){
        Route::get('list', ['as' => 'admin.article.list', 'uses' => 'ArticleController@getlist']);
        Route::get('add', ['as' => 'admin.article.getadd', 'uses' => 'ArticleController@getadd']);
        Route::post('add', ['as' => 'admin.article.postadd', 'uses' => 'ArticleController@postadd']);
        Route::get('delete/{id}', ['as' => 'admin.article.delete', 'uses' => 'ArticleController@getdelete']);
        Route::get('edit/{id}', ['as' => 'admin.article.getedit', 'uses' => 'ArticleController@getedit']);
        Route::post('edit/{id}', ['as' => 'admin.article.postedit', 'uses' => 'ArticleController@postedit']);
    });

    //popup
    Route::group(['prefix' => 'popup'],function(){
        Route::get('list', ['as' => 'admin.popup.list', 'uses' => 'PopupController@getlist']);
        Route::get('add', ['as' => 'admin.popup.getadd', 'uses' => 'PopupController@getadd']);
        Route::post('add', ['as' => 'admin.popup.postadd', 'uses' => 'PopupController@postadd']);
        Route::get('delete/{id}',['as' => 'admin.popup.delete', 'uses' => 'PopupController@getdelete']);
        Route::get('edit/{id}', ['as' => 'admin.popup.getedit', 'uses' => 'PopupController@getedit']);
        Route::post('edit/{id}', ['as' => 'admin.popup.postedit', 'uses' => 'PopupController@postedit']);
    });

    //tags
    Route::group(['prefix' => 'tag'],function(){
        Route::get('list', ['as'=>'admin.tag.list', 'uses'=>'TagsController@getlist']);
    });

});



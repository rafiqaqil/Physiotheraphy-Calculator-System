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


use App\Mail\NewUserWelcomeMail;

Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::post('/addTrans', 'TransactionController@store');

Route::get('/p/{post}', 'PostsController@show');
Route::get('/p/{post}/{user}/edit', 'PostsController@edit')->name('post.edit');
Route::patch('/edit/{post}/{user}', 'PostsController@update')->name('post.update');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/translist', 'ProfilesController@translist')->name('profile.translist');


Route::get('/profile/{user}/printReport', 'ReportPDF@makepdf')->name('profile.translist');
Route::get('/profile/{user}/postlist', 'ProfilesController@postlist')->name('profile.postlist');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/profile/{user}/createTrans', 'TransactionController@createPICK');
Route::get('/profile/{user}/createTransIN', 'TransactionController@createIN');
Route::get('/profile/{user}/createTransOUT', 'TransactionController@createOUT');
Route::get('/profile/{user}/createTransDOC', 'TransactionController@createDOC');
Route::get('/profile/{user}/createTransADVANCE', 'TransactionController@createADVANCE');
Route::get('/{user}/editTrans/{transaction}', 'TransactionController@edit');
Route::patch('/{user}/editTrans/{transaction}/update', 'TransactionController@update');
Route::get('/{user}/editTrans/{transaction}/softdel', 'TransactionController@softdel');
Route::get('/{user}/editTrans/{transaction}/restoreMe', 'TransactionController@restoreMe');
Route::get('/{user}/editTrans/{transaction}/destroyMe', 'TransactionController@destroyMe');


Route::get('/profile/{user}/createMydata', 'MydataController@ClientInputForm');
Route::post('/profile/{user}/ServerStoreData', 'MydataController@ServerStoreData');
Route::get('/profile/{user}/ShowMyData', 'MydataController@ShowMyData');
Route::get('/profile/{user}/ShowRecMyData', 'MydataController@ShowRecMyData');
Route::get('/{user}/editMydata/{mydata}/softdel', 'MydataController@softdel');
Route::get('/{user}/editMydata/{mydata}/restoreMe', 'MydataController@restoreMe');
Route::get('/{user}/editMydata/{mydata}/destroyMe', 'MydataController@destroyMe');
Route::get('/{user}/editMydata/{mydata}', 'MydataController@ShowEditPage');
Route::patch('/{user}/editMydata/{mydata}/ServerUpdate', 'MydataController@ServerUpdate');


Route::get('/ShowMyDataMaster', 'MydataController@ShowMyDataMaster');
Route::get('/{user}/MastereditMydata/{mydata}', 'MydataController@MasterShowEditPage');
Route::patch('/{user}/editMydata/{mydata}/MasterServerUpdate', 'MydataController@MasterServerUpdate');

//Quotes CRUD + Recycle 
Route::get('/{user}/MyQuotesList', 'QuotesController@index');
Route::get('/CreateQuote', 'QuotesController@create');
Route::post('/StoreQuote', 'QuotesController@store');
Route::get('/MyQuotesList/{quote}', 'QuotesController@show');
Route::get('/EditQuote/{quote}', 'QuotesController@edit');
Route::patch('/UpdateQuote/{quote}', 'QuotesController@update');
Route::get('/DestroyQuote/{quote}', 'QuotesController@softdel');

//Items CRUD + Recycle 
Route::get('/{quote}/ItemShow', 'ItemsController@index');
Route::get('/{quote}/CreateItem', 'ItemsController@create');
Route::post('{quote}/StoreItem', 'ItemsController@store');
Route::get('/EditItem/{item}', 'ItemsController@edit');
Route::patch('/UpdateItem/{item}/', 'ItemsController@update');
Route::get('/DestroyItem/{item}', 'ItemsController@softdel');


//Project CRUD + Recycle 
Route::get('/{user}/ProjectShow', 'ProjectsController@index');
Route::get('/ProjectShowThisOne/{project}', 'ProjectsController@show');
Route::get('/CreateProject', 'ProjectsController@create');
Route::post('/StoreProject', 'ProjectsController@store');
Route::get('/EditProject/{project}', 'ProjectsController@edit');
Route::patch('/UpdateProject/{project}/', 'ProjectsController@update');
Route::get('/DestroyProject/{project}', 'ProjectsController@softdel');

//GENERATE PDF 

Route::get('/ProjectCosting/{project}', 'ProjectsController@generateProjectCosting');
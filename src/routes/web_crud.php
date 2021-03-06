<?php
		
//=========ADMIN CRUD TESTING MANAGEMENT MODULE ROUTES
	if (env('PACKAGE_DEVELOPMENT')) 
	{
		// $prefix_value_crud='';	
		// return "true";

		Route::group(['prefix' => ADMIN_KEYWORD()],function(){

		Route::group(['prefix' => '/'.ADMIN_CRUD_KEYWORD()],function(){
		Route::get('/','evalue\crud\CrudController@index');
		Route::get("/add", 'evalue\crud\CrudController@add');
		Route::get("/edit/{id}", 'evalue\crud\CrudController@add');
		Route::post("/do_save", 'evalue\crud\CrudController@do_save');
		Route::get("/status_change/{id}", 'evalue\crud\CrudController@status_change');
		Route::get("/delete_single/{id}", 'evalue\crud\CrudController@delete_single');
		Route::post("/delete_all", 'evalue\crud\CrudController@delete_all');
		Route::post("/active_all", 'evalue\crud\CrudController@active_all');
		Route::post("/inactive_all", 'evalue\crud\CrudController@inactive_all');
		});
	});

	}
	else
	{
		// $prefix_value_crud='evalue\crud';
		// return "false";
		Route::group(['prefix' => ADMIN_KEYWORD()],function(){

		Route::group(['prefix' => '/'.ADMIN_CRUD_KEYWORD()],function(){
		Route::get('/','App\Http\Controllers\CrudController@index');
		Route::get("/add", 'App\Http\Controllers\CrudController@add');
		Route::get("/edit/{id}", 'App\Http\Controllers\CrudController@add');
		Route::post("/do_save", 'App\Http\Controllers\CrudController@do_save');
		Route::get("/status_change/{id}", 'App\Http\Controllers\CrudController@status_change');
		Route::get("/delete_single/{id}", 'App\Http\Controllers\CrudController@delete_single');
		Route::post("/delete_all", 'App\Http\Controllers\CrudController@delete_all');
		Route::post("/active_all", 'App\Http\Controllers\CrudController@active_all');
		Route::post("/inactive_all", 'App\Http\Controllers\CrudController@inactive_all');
		});
	});

	}
	
	
	
//=========ADMIN CRUD TESTING MANAGEMENT MODULE ROUTES


	//========= PUT THIS CODE IN YOUR WEB.PHP FOR ADMIN CRUD TESTING MANAGEMENT MODULE ROUTES


	// Route::group(['prefix' => '/'.ADMIN_CRUD_KEYWORD()],function(){
	// 	Route::get('/','CrudController@index');
	// 	Route::get("/add", 'CrudController@add');
	// 	Route::get("/edit/{id}", 'CrudController@add');
	// 	Route::post("/do_save", 'CrudController@do_save');
	// 	Route::get("/status_change/{id}", 'CrudController@status_change');
	// 	Route::get("/delete_single/{id}", 'CrudController@delete_single');
	// 	Route::post("/delete_all", 'CrudController@delete_all');
	// 	Route::post("/active_all", 'CrudController@active_all');
	// 	Route::post("/inactive_all", 'CrudController@inactive_all');
	// });


//========= PUT THIS CODE IN YOUR WEB.PHP FOR ADMIN CRUD TESTING MANAGEMENT MODULE ROUTES
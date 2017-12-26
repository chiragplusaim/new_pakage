<?php

Route::get('/', function(){
	echo 'Hello from the eval!';
});
Route::get('crud','evalue\crud\CrudController@index');
Route::get("/add", 'evalue\crud\CrudController@add');
Route::get("/edit/{id}", 'evalue\crud\CrudController@add');
Route::post("/do_save", 'evalue\crud\CrudController@do_save');
Route::get("/status_change/{id}", 'evalue\crud\CrudController@status_change');
Route::get("/delete_single/{id}", 'evalue\crud\CrudController@delete_single');
Route::post("/delete_all", 'evalue\crud\CrudController@delete_all');
Route::post("/active_all", 'evalue\crud\CrudController@active_all');
Route::post("/inactive_all", 'evalue\crud\CrudController@inactive_all');

// Route::get('add/{a}/{b}', 'Devdojo\Calculator\CalculatorController@add');
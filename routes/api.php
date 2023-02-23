<?php

Route::prefix('shelters')->group(function () {

	Route::get('/', ['uses' => 'SheltersController@getShelters']);
	Route::post('/', ['uses' => 'SheltersController@create']);
	Route::delete('/{shelter_id}', ['uses' => 'SheltersController@delete'])->where(['shelter_id' => '[0-9]+']);

	Route::post('/{shelter_id}/workers', ['uses' => 'WorkersController@create'])->where(['shelter_id' => '[0-9]+']);
	Route::delete('/workers/{worker_id}', ['uses' => 'WorkersController@delete'])->where(['worker_id' => '[0-9]+']);
});

Route::prefix('animals')->middleware(['pubsub'])->group(function () {

	Route::get('/', ['uses' => 'AnimalsController@getAnimals']);
	Route::get('/{animal_id}', ['uses' => 'AnimalsController@detailt'])->where(['animal_id' => '[0-9]+']);
	Route::post('/', ['uses' => 'AnimalsController@create']);
	Route::delete('/{animal_id}', [ 'uses' => 'AnimalsController@delete'])->where(['animal_id' => '[0-9]+']);
	Route::put('/{animal_id}/adaptable', [ 'uses' => 'AnimalsController@adaptable'])->where(['animal_id' => '[0-9]+']);;

	Route::get('/requests', ['uses' => 'AdaptationRequestsController@get']);
	Route::delete('/requests/{request_id}', ['uses' => 'AdaptationRequestsController@delete'])
		->where(['request_id' => '[0-9]+']);
});




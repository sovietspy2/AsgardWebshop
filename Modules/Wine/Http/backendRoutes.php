<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/wine'], function (Router $router) {
    $router->bind('wine', function ($id) {
        return app('Modules\Wine\Repositories\WineRepository')->find($id);
    });
    $router->get('wines', [
        'as' => 'admin.wine.wine.index',
        'uses' => 'WineController@index',
        'middleware' => 'can:wine.wines.index'
    ]);
    $router->get('wines/create', [
        'as' => 'admin.wine.wine.create',
        'uses' => 'WineController@create',
        'middleware' => 'can:wine.wines.create'
    ]);
    $router->post('wines', [
        'as' => 'admin.wine.wine.store',
        'uses' => 'WineController@store',
        'middleware' => 'can:wine.wines.create'
    ]);
    $router->get('wines/{wine}/edit', [
        'as' => 'admin.wine.wine.edit',
        'uses' => 'WineController@edit',
        'middleware' => 'can:wine.wines.edit'
    ]);
    $router->put('wines/{wine}', [
        'as' => 'admin.wine.wine.update',
        'uses' => 'WineController@update',
        'middleware' => 'can:wine.wines.edit'
    ]);
    $router->delete('wines/{wine}', [
        'as' => 'admin.wine.wine.destroy',
        'uses' => 'WineController@destroy',
        'middleware' => 'can:wine.wines.destroy'
    ]);
// append

});

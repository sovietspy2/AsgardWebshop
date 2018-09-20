<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/test'], function (Router $router) {
    $router->bind('test', function ($id) {
        return app('Modules\Test\Repositories\TestRepository')->find($id);
    });
    $router->get('tests', [
        'as' => 'admin.test.test.index',
        'uses' => 'TestController@index',
        'middleware' => 'can:test.tests.index'
    ]);
    $router->get('tests/create', [
        'as' => 'admin.test.test.create',
        'uses' => 'TestController@create',
        'middleware' => 'can:test.tests.create'
    ]);
    $router->post('tests', [
        'as' => 'admin.test.test.store',
        'uses' => 'TestController@store',
        'middleware' => 'can:test.tests.create'
    ]);
    $router->get('tests/{test}/edit', [
        'as' => 'admin.test.test.edit',
        'uses' => 'TestController@edit',
        'middleware' => 'can:test.tests.edit'
    ]);
    $router->put('tests/{test}', [
        'as' => 'admin.test.test.update',
        'uses' => 'TestController@update',
        'middleware' => 'can:test.tests.edit'
    ]);
    $router->delete('tests/{test}', [
        'as' => 'admin.test.test.destroy',
        'uses' => 'TestController@destroy',
        'middleware' => 'can:test.tests.destroy'
    ]);
// append

});

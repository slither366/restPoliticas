<?php

use Illuminate\Http\Request;

Route::resource('users','User\UserController',['except'=>['create','edit']]);

Route::resource('DepositoTarde','DepositoTarde\DepositoTardeController',['except'=>['create','edit']]);

Route::get('/verPrueba/{DepositoTarde}','DepositoTarde\DepositoTardeController@getLlaveDif');
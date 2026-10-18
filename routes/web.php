<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/zeiten');

Route::livewire('/zeiten', 'pages::zeiten.index');
Route::livewire('/zeiten/erfassen', 'pages::zeiten.create');

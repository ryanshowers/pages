<?php

Route::get(config('pages.route') . '/trash', 'Ryanshowers\Pages\PageController@trash');
Route::post(config('pages.route') . '/sort', 'Ryanshowers\Pages\PageController@sort');
Route::resource(config('pages.route'), 'Ryanshowers\Pages\PageController');

?>
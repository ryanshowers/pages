<?php

Route::get(config('pages.route') . '/trash', 'Ryanshowers\Pages\PageController@trash');
Route::resource(config('pages.route'), 'Ryanshowers\Pages\PageController');

?>
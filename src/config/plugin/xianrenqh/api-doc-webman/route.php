<?php

use Webman\Route;

Route::any('/apidoc', [xianrenqh\ApiDocWebman\Index::class, 'index']);
Route::any('/apidoc/check_auth', [xianrenqh\ApiDocWebman\BootstrapApiDoc::class, 'check_auth']);

<?php

use \app\inc\Route;

Route::add("extensions/watsonc_sigfox/api/sigfox",
    function () {
        \app\models\Database::setDb("watsonc");
    }
);
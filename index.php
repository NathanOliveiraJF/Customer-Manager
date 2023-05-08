<?php

use Pecee\SimpleRouter\SimpleRouter;

require "./vendor/autoload.php";
require "./vendor/pecee/simple-router/helpers.php";
require "./routes.php";

session_start();

try {
    SimpleRouter::start();
} catch (\Pecee\Http\Middleware\Exceptions\TokenMismatchException|\Pecee\SimpleRouter\Exceptions\NotFoundHttpException|\Pecee\SimpleRouter\Exceptions\HttpException|Exception $e) {
    error_log("error: ".$e);
}


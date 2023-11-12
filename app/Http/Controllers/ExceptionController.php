<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ResponseController;


class ExceptionController extends Controller
{
    //

    public function GenerarException($th){
        app(LogController::class)->Error($th);
        $error = app(ErrorController::class)->MapearError($th);
        $response = app(ResponseController::class)->PreparaResponse($error);
        return $response;
    }
}

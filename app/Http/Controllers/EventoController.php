<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventoController extends Controller
{
  public function getall () {
    $resultado = app('db')->select("SELECT * FROM eventos");
    $var = $resultado;

    return $var;
  }
}

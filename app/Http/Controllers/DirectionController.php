<?php

namespace App\Http\Controllers;

use App\Directions;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function show() {
        $directions = Directions::all();
        return response()->json([
          'status' => 'success',
          'directions' => $directions->toArray()
        ]);
    }
}

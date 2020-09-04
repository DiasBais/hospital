<?php

namespace App\Http\Controllers;

use App\User;
use App\query;
use App\doctor;
use App\Directions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Libs\CheckRole;
use App\Libs\returnStatus;

class QueriesController extends Controller
{
    public function validateForAdd($data)
    {
        return Validator::make($data, [
            'doctor' => 'required',
            'reception' => 'required|min:17|max:19',
        ]);
    }

    public function showDirections()
    {
        $directions = Directions::all();
        return response()->json(
            [
                'status' => 'success',
                'directions' => $directions
            ], 200);
    }

    public function showDoctors()
    {
        // if ($auther = autherTrue(Auth::user()->role, [ 1 ])) return returnError('Forbidden', 403);

        $doctors = doctor::with('directions')->get();

        // return returnSuccess('doctors', $doctors);
        return response()->json(
            [
                'status' => 'success',
                'doctors' => $doctors
            ], 200);
    }

    public function showQueries()
    {
        // if ($auther = autherTrue(Auth::user()->role, [ 3 ])) return returnError('Forbidden', 403);
        $id = Auth::user()->id;

        $queries = query::where('user_id', $id)->get();

        // return returnSuccess('queries', $queries->toArray());
        return response()->json(
            [
                'status' => 'success',
                'queries' => $queries
            ], 200);
    }

    public function add(Request $request)
    {
        // if ($auther = autherFalse(Auth::user()->role, [ 1 ])) return returnError('Forbidden', 403);

        $reception = $request->reception;

        if ($this->validateForAdd($request->all())->fails()) {
          return response()->json(
              [
                  'status' => 'error',
                  'errors' => $v-fails()
              ], 422);
        }

        if (strlen($reception) !== 19 ||
                  $reception[4] != '-' ||
                  $reception[7] != '-' ||
                  $reception[10] != ' ' ||
                  $reception[13] != ':' ||
                  $reception[16] != ':')
        {
            return response()->json(
                [
                    'status' => 'error',
                    'errors' => 'Reception'
                ], 422);
        }

        $user = User::find($request->doctor);

        $query = new query;
        $query->patient = Auth::user()->name;
        $query->user_id = $user->id;
        $query->reception = $reception;
        $query->save();
        return response()->json(['status' => 'success'], 200);
    }
}

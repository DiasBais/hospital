<?php

namespace App\Http\Controllers;

use App\User;
use App\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Libs\CheckRole;
use App\Libs\StringChange;
use App\Libs\returnStatus;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }
    public function changeRole($id)
    {
        if (Auth::user()->role != 2)
        {
            return response()->json([
                'status' => 'error',
                'errors' => "Forbidden"
            ], 403);
        }
        $user = User::find($id);
        if ($user->role == 1)
        {
            $user->role = 3;
            $user->save();

            return response()->json(['status' => 'success'], 200);
        }
        else
        {
            $user->role = 1;
            $user->save();

            return response()->json(['status' => 'success'], 200);
        }
    }
    public function changeRolePatientOnDoctor(Request $request)
    {
        $v = Validator::make($request->all(), [
            'direction' => 'required|max:255',
            'phone'  => 'required',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $user = User::find($request->id);

        $user->role = 3;
        $name = $user->name;
        $user->save();

        $doctor = [];

        $doctor['name'] = $name;
        $doctor['phone'] = $request->phone;
        $doctor['user_id'] = $request->id;
        $doctor['direction_id'] = $request->direction;
        doctor::insert($doctor);

        return response()->json(['status' => 'success'], 200);
    }
    public function changeRoleDoctorOnPatient(Request $request)
    {
        if (Auth::user()->role != 2)
        {
            return response()->json([
                'status' => 'error',
                'errors' => "Forbidden"
            ], 403);
        }
        $user = User::find($request->id);

        $user->role = 1;
        $user->save();

        return response()->json([
                'status' => 'success',
            ], 200);
    }
}

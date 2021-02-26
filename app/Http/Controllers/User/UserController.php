<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * you can filter the user depending of the thing that you want to filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->name)) {
            return response()->json([
                'users' => User::where('role', '!=', 'owner')->where('name','ilike','%'.$request->name.'%')->latest()->paginate(25),
                'status' => 'success',
            ], 200);
        } else if(isset($request->role)) {
            return response()->json([
                'users' => User::where('role', '!=', 'owner')->where('role','ilike','%'.$request->role.'%')->latest()->paginate(25),
                'status' => 'success',
            ], 200);
        } else {
            return response()->json([
                'users' => User::where('role', '!=', 'owner')->paginate(25),
                'status' => 'success',
            ], 200);
        }
    }
}

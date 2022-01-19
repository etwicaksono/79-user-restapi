<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|string|min:3|unique:users",
            "password" => "required|string|min:7",
            "name" => "required|string|min:3",
        ]);

        try {
            $user = new User();
            $user->username = $request->username;
            $user->password = \app("hash")->make($request->password);
            $user->name = $request->name;
            $user->save();

            return \response()->json([], \http_response_code());
        } catch (Throwable $t) {
            return \response()->json([
                "error" => true,
                "message" => $t->getMessage()
            ], \http_response_code());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
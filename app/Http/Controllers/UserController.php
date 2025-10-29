<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all users from Models
        $users = user::latest()->get();

        //return view with data
        return view('users', compact('users'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'   => 'required',
            'password'     => 'required',
            'telp'   => 'required',
            'level'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = user::create([
            'name'     => $request->name, 
            'email'   => $request->email,
            'password'  => Hash::make($request->password),
            'telp'   => $request->telp,
            'level'   => $request->level,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $user  
        ]);
    }

    /**
     * show
     *
     * @param  mixed $user
     * @return void
     */
    public function show(user $user)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data user',
            'data'    => $user  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(Request $request, user $user)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'   => 'required',
            'password'     => 'required',
            'telp'   => 'required',
            'level'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user->update([
            'name'     => $request->name, 
            'email'   => $request->email,
            'password'  => Hash::make($request->password),
            'telp'   => $request->telp,
            'level'   => $request->level
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $user  
        ]);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //delete user by ID
        user::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data user Berhasil Dihapus!.',
        ]); 
    }
    public function news(){

        return $this->hasMany(News::class);
    }
}
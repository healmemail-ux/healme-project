<?php

namespace App\Http\Controllers;

use App\Models\lelang;
use App\Models\User;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LelangController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all lelangs from Models
        $lelangs = lelang::latest()->get();
        $users = User::all(['id','name']);
        $barangs = barang::all(['id','nama_barang']);


        //return view with data
        return view('lelangs', compact('lelangs', 'users', 'barangs'));
        //return view('lelangs', compact ('lelangs'));
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
            'barang_id'     => 'required',
            'tgl_lelang'   => 'required',
            'user_id'     => '',
            'harga_akhir'   => 'required',
            'status'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create lelang
        $lelang = lelang::create([
            'barang_id'     => $request->barang_id, 
            'tgl_lelang'   => $request->tgl_lelang,
            'user_id'   =>    auth()->user()->id,
            'harga_akhir'   => $request->harga_akhir,
            'status'   => $request->status,

        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $lelang 
        ]);
    }

    /**
     * show
     *
     * @param  mixed $lelang
     * @return void
     */
    public function show(lelang $lelang)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Lelang',
            'data'    => $lelang 
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $lelang
     * @return void
     */
    public function update(Request $request, lelang $lelang)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'barang_id'     => 'required',
            'tgl_lelang'   => 'required',
            'user_id'     => '',
            'harga_akhir'   => 'required',
            'status'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create lelang
        $lelang->update([
            'barang_id'     => $request->barang_id, 
            'tgl_lelang'   => $request->tgl_lelang,
            'user_id'   =>    auth()->user()->id,
            'harga_akhir'   => $request->harga_akhir,
            'status'   => $request->status,

        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $lelang  
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
        //delete lelang by ID
        Lelang::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Lelang Berhasil Dihapus!.',
        ]); 
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\history_lelang;
use App\Models\lelang;
use App\Models\User;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class History_lelangController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all history_lelangs from Models
        $history_lelangs = history_lelang::latest()->get();
        $lelangs = lelang::all(['id','harga_akhir']);
        $users = User::all(['id','name']);
        $barangs = barang::all(['id','nama_barang']);


        //return view with data
        return view('history_lelangs', compact( 'history_lelangs', 'lelangs', 'users', 'barangs'));
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
            'lelang_id'     => 'required',
            'barang_id'   => 'required',
            'user_id'     => 'required',
            'penawaran_harga'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $history_lelangs = history_lelang::create([
            'lelang_id'     => $request->lelang_id, 
            'barang_id'   => $request->barang_id,
            'user_id'   => $request->user_id,
            'penawaran_harga'   => $request->penawaran_harga,

        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $history_lelangs  
        ]);
    }

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show(Lelang $lelang)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Penawaran',
            'lelang'    => $lelang  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $history_lelang
     * @return void
     */
    public function update(Request $request, history_lelang $history_lelangs)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'lelang_id'     => 'required',
            'barang_id'   => 'required',
            'user_id'     => 'required',
            'penawaran_harga'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create history_lelang
        $history_lelangs->update([
            'lelang_id'     => $request->lelang_id, 
            'barang_id'   => $request->barang_id,
            'user_id'   => $request->user_id,
            'penawaran_harga'   => $request->penawaran_harga,

        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $history_lelangs  
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
        //delete history_lelang by ID
        history_lelang::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data history_lelang Berhasil Dihapus!.',
        ]); 
    }
}
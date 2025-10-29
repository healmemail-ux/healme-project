<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class barangController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all barangs from Models
        $barangs = barang::latest()->get();

        //return view with data
        return view('barangs', compact('barangs'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'nama_barang'     => 'required',
            'tgl'   => 'required',
            'harga_awal'   => 'required',
            'deskripsi_barang'   => 'required',       
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
                
        if($validator->passes()){
            $image = $request->file('image');
            $new_name = $image->getClientOriginalName();
            $image->move(public_path('image'), $new_name);
            
            //create barang
            $barang = barang::create([
                'nama_barang'     => $request->nama_barang, 
                'tgl'     => $request->tgl,
                'harga_awal'   => $request->harga_awal,
                'deskripsi_barang'   => $request->deskripsi_barang,
                'image'   => $new_name
            ]);

            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
                'data'    => $barang
            ]);
            
        }
        else {
            return response()->json([
             'message'   => $validator->errors()->all(),
             'uploaded_image' => '',
             'class_name'  => 'alert-danger'
            ]);
        }    
        
    }

    /**
     * show
     *
     * @param  mixed $barang
     * @return void
     */
    public function show(barang $barang)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data barang',
            'data'    => $barang  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $barang
     * @return void
     */
    public function update(Request $request, barang $barang)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_barang'     => 'required',
            'tgl'   => 'required',
            'harga_awal'   => 'required',
            'deskripsi_barang'   => 'required',
            'image'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $image = $request->file('image');
        $new_name = $image->getClientOriginalName();
        $image->move(public_path('image'), $new_name);

        //create barang
        $barang->update([
            'nama_barang'   => $request->nama_barang, 
            'tgl'   => $request->tgl,
            'harga_awal'   => $request->harga_awal, 
            'deskripsi_barang'   => $request->deskripsi_barang,
            'image'   => $new_name
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $barang  
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
        //delete barang by ID
        barang::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data barang Berhasil Dihapus!.',
        ]); 
    }
}
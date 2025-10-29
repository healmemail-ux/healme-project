<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all barangs from Models
        $barang1 = DB::table('barangs')->skip(0)->take (3)->get();
        $barang2 = DB::table('barangs')->skip(4)->take (6)->get();

        //return view with data
        return view('welcome', compact('barang1', 'barang2'));
        
    }

      public function detail(barang $barang)
    {
        //get post by ID
        return view('detail', compact('barang'));
        
    }
}

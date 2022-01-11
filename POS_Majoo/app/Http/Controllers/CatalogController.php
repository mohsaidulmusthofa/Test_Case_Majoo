<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    // menampilkan catalog produk
    public function index(){
        $catalog = DB::table('produk')->get();
        return view('catalog_produk', compact('catalog'));
    }
}

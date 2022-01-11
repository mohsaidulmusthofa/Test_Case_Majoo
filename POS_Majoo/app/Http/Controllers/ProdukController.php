<?php

namespace App\Http\Controllers;

use App\Models\KategoriProdukModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    // Function untuk view halaman Produk
    public function index(){
        // Query get data produk dari database
        $data_produk = DB::table('produk')->paginate(2);
        // Mengirim data produk ke view produk
        return view('produk.produk', compact('data_produk'));
    }

    // Function untuk view halaman Tambah Produk
    public function create(){
        // Query get data kategori Produk
        $kategori = KategoriProdukModel::all();
        // Mengirim data ke view tambah produk
        return view('produk.tambahproduk', compact('kategori'));
    }

    // Function tambah produk
    public function store(Request $request){
        
        // Pesan 
        $message = [
            'required' => 'Kolom wajib diisi.'
        ];

        //form validation
        $this->validate(request(), [
            'nama_produk'           => 'required',
            'id_kategori_produk'    => 'required',
            'harga_produk'          => 'required',
            'deskripsi_produk'      => 'required',
        ], $message);

        $produk                     = new ProdukModel();
        $produk->nama_produk        = $request->nama_produk;
        $produk->id_kategori_produk = $request->id_kategori_produk;
        $produk->harga_produk       = $request->harga_produk;
        $produk->deskripsi_produk   = $request->deskripsi_produk;
        // cek apakah ada gambar yang di upload
        if ($image = $request->file('foto_produk')) {
            $destinationPath = 'image/produk/';
            $produkImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $produkImage);
            $produk['foto_produk'] = "$produkImage";
        }
        $produk->save();

        if ($produk) {
            // redirect dengan pesan Berhasil 
            return redirect()->route('vproduk')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('create.produk')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    //function untuk view halaman edit produk
    public function edit(Request $request, $id_produk){
        $this->ProdukModel  = new ProdukModel();
        $data = $this->ProdukModel->getproduk($id_produk);
        $kategori = KategoriProdukModel::all();
        // dd($data);
        return view('produk.editproduk', compact('data', 'kategori'));
    }

    // function untuk update produk
    public function update(Request $request, ProdukModel $produkmodel, $id_produk){

        // Pesan 
        $message = [
            'required' => 'Kolom wajib diisi.'
        ];

        //form validation
        $this->validate(request(), [
            'nama_produk'           => 'required',
            'id_kategori_produk'    => 'required',
            'harga_produk'          => 'required',
            'deskripsi_produk'      => 'required',
        ], $message);

        //get data produk berdasarkan id
        $produkmodel = ProdukModel::findorfail($id_produk);
        // cek apakah ada foto yang diupload
        if ($request->file('foto_produk') == "") {
            $produkmodel->update([
                'nama_produk'        => $request->nama_produk,
                'id_kategori_produk' => $request->id_kategori_produk,
                'harga_produk'       => $request->harga_produk,
                'deskripsi_produk'   => $request->deskripsi_produk
            ]);
        }else{
            // jika ada foto yang diupload, hapus foto sebelumnya
            $produkmodel->delete_gambar();

            $image = $request->file('foto_produk');
            $destinationPath = 'image/produk/';
            $produkImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $produkImage);
            //input ke database
            $produkmodel['foto_produk'] = "$produkImage";
            $produkmodel->update([
                'nama_produk'        => $request->nama_produk,
                'id_kategori_produk' => $request->id_kategori_produk,
                'harga_produk'       => $request->harga_produk,
                'deskripsi_produk'   => $request->deskripsi_produk
            ]);

        }
        if ($produkmodel) {
            // redirect dengan pesan Berhasil 
            return redirect()->route('vproduk')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('edit.produk')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // function delete produk
    public function delete(ProdukModel $produkmodel, $id_produk){
        // get function dari model
        $produk = $produkmodel->delete_produk($id_produk);
        if ($produk) {
            // redirect dengan pesan Berhasil 
            return redirect()->route('vproduk')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vproduk')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

}

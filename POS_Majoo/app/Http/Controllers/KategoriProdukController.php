<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriProdukModel;


class KategoriProdukController extends Controller
{
    // Function untuk view halaman Produk
    public function index(){
        // Query get data kategori produk dari database
        $data_kategori = DB::table('kategori_produk')->paginate(2);
        // Mengirim data kategori produk ke view produk
        return view('kategori_produk.kategoriproduk', compact('data_kategori'));
    }

    // Function untuk view halaman Tambah Produk
    public function create(){
        // Mengirim data ke view tambah produk
        return view('kategori_produk.tambahkategori');
    }

    // Function tambah produk
    public function store(Request $request){
        
        // Pesan 
        $message = [
            'required' => 'Kolom wajib diisi.'
        ];

        //form validation
        $this->validate(request(), [
            'nama_kategori_produk'          => 'required',
            'deskripsi_kategori_produk'     => 'required',
        ], $message);

        $kategori                              = new KategoriProdukModel();
        $kategori->nama_kategori_produk        = $request->nama_kategori_produk;
        $kategori->deskripsi_kategori_produk   = $request->deskripsi_kategori_produk;
        // cek apakah ada gambar yang di upload
        if ($image = $request->file('foto_kategori_produk')) {
            $destinationPath = 'image/kategori_produk/';
            $produkImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $produkImage);
            $kategori['foto_kategori_produk'] = "$produkImage";
        }
        $kategori->save();

        if ($kategori) {
            // redirect dengan pesan Berhasil 
            return redirect()->route('vkategori')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('create.kategori')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    //function untuk view halaman edit kategori produk
    public function edit(Request $request, $id_kategori){
        $this->KategoriProduk  = new KategoriProdukModel();
        $data = $this->KategoriProduk->getproduk($id_kategori);
        // dd($data);
        return view('kategori_produk.editkategori', compact('data'));
    }

    // function untuk update kategori produk
    public function update(Request $request, KategoriProdukModel $kategoriproduk, $id_kategori){

        // Pesan 
        $message = [
            'required' => 'Kolom wajib diisi.'
        ];

        //form validation
        $this->validate(request(), [
            'nama_kategori_produk'          => 'required',
            'deskripsi_kategori_produk'     => 'required',
        ], $message);

        //get data produk berdasarkan id
        $kategoriproduk = KategoriProdukModel::findorfail($id_kategori);
        // cek apakah ada foto yang diupload
        if ($request->file('foto_kategori_produk') == "") {
            $kategoriproduk->update([
                'nama_kategori_produk'          => $request->nama_kategori_produk,
                'deskripsi_kategori_produk'     => $request->deskripsi_kategori_produk
            ]);
        }else{
            // jika ada foto yang diupload, hapus foto sebelumnya
            $kategoriproduk->delete_gambar();

            $image = $request->file('foto_kategori_produk');
            $destinationPath = 'image/kategori_produk/';
            $produkImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $produkImage);
            //input ke database
            $kategoriproduk['foto_kategori_produk'] = "$produkImage";
            $kategoriproduk->update([
                'nama_kategori_produk'          => $request->nama_kategori_produk,
                'deskripsi_kategori_produk'     => $request->deskripsi_kategori_produk
            ]);

        }
        if ($kategoriproduk) {
            // redirect dengan pesan Berhasil 
            return redirect()->route('vkategori')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('edit.kategori')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // function delete produk
    public function delete(KategoriProdukModel $produkkategori, $id_kategori){
        // get function dari model
        $produk = $produkkategori->delete_kategori($id_kategori);
        if ($produk) {
            // redirect dengan pesan Berhasil 
            return redirect()->route('vkategori')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vkategori')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}

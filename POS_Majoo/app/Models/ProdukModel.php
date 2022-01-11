<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'id_kategori_produk',
        'harga_produk',
        'foto_produk',
        'deskripsi_produk'
    ];

    protected $primaryKey = 'id_produk';

    //menghubungkan produk ke kategori produk
    public function kategori(){
        return $this->belongsTo(KategoriProdukModel::class, 'id_kategori_produk');
    }
    
    // function untuk get data produk join dengan kategori produk berdasarkan id_produk
    public function getproduk($id_produk){
        return DB::table('produk')
        ->join('kategori_produk', 'kategori_produk.id_kategori_produk','=','produk.id_kategori_produk')
        ->where('produk.id_produk','=',$id_produk)
        ->first();
    }

    // function untuk delete gambar ketika update gambar baru
    public function delete_gambar()
    {
        if ($this->foto_produk && file_exists(public_path('image/produk/' . $this->foto_produk))) {
            return unlink(public_path('image/produk/' . $this->foto_produk));
        }
    }

    // function delete data produk
    public function delete_produk($id_produk){
        return DB::table('produk')->where('id_produk','=', $id_produk)->delete();
    } 
}

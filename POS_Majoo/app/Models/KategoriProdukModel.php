<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriProdukModel extends Model
{
    use HasFactory;
    protected $table = 'kategori_produk';
    public $timestamps = true;

    protected $fillable = [
        'nama_kategori_produk',
        'deskripsi_kategori_produk',
        'foto_kategori_produk',
    ];

    protected $primaryKey = 'id_kategori_produk';

    //menghubungkan produk ke kategori produk
    public function produk(){
        return $this->hasMany(ProdukModel::class);
    }

    // function untuk get data kategori produk berdasarkan id_kategori_produk
    public function getproduk($id_kategori){
        return DB::table('kategori_produk')
        ->where('kategori_produk.id_kategori_produk','=',$id_kategori)
        ->first();
    }

    // function untuk delete gambar ketika update gambar baru
    public function delete_gambar()
    {
        if ($this->foto_kategori_produk && file_exists(public_path('image/kategori_produk/' . $this->foto_kategori_produk))) {
            return unlink(public_path('image/kategori_produk/' . $this->foto_kategori_produk));
        }
    }

    // function delete data kategori produk
    public function delete_kategori($id_kategori){
        return DB::table('kategori_produk')->where('id_kategori_produk','=', $id_kategori)->delete();
    } 
}

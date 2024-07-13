<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_pelapak id pelapak
@property int $id_produk_kategori id produk kategori
@property varchar $nama nama
@property int $harga harga
@property varchar $satuan satuan
@property tinyint $tipe_potongan tipe potongan
@property int $potongan potongan
@property text $deskripsi deskripsi
@property varchar $foto foto
@property tinyint $status status
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property IdProdukKategori $produkKategori belongsTo
@property IdPelapak $pelapak belongsTo
   
 */
class Produk extends Model
{

    /**
     * Database table name
     */
    protected $table = 'produk';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_pelapak',
        'id_produk_kategori',
        'nama',
        'harga',
        'satuan',
        'tipe_potongan',
        'potongan',
        'deskripsi',
        'foto',
        'status'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idProdukKategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idProdukKategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'id_produk_kategori');
    }

    /**
     * idPelapak
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idPelapak()
    {
        return $this->belongsTo(Pelapak::class, 'id_pelapak');
    }
}

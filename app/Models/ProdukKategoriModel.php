<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $kategori kategori
@property varchar $slug slug
@property tinyint $status status
@property \Illuminate\Database\Eloquent\Collection $produk hasMany
   
 */
class ProdukKategori extends Model
{

    /**
     * Database table name
     */
    protected $table = 'produk_kategori';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'status',
        'kategori',
        'slug',
        'status'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * produks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_produk_kategori');
    }
}

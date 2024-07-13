<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama_barang nama barang
@property varchar $kode_barang kode barang
@property varchar $register register
@property varchar $kontruksi kontruksi
@property int $panjang panjang
@property int $lebar lebar
@property int $luas luas
@property mediumtext $letak letak
@property date $tanggal_dokument tanggal dokument
@property varchar $no_dokument no dokument
@property varchar $status_tanah status tanah
@property varchar $kode_tanah kode tanah
@property varchar $kondisi kondisi
@property varchar $asal asal
@property double $harga harga
@property mediumtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $status status
@property int $visible visible
@property \Illuminate\Database\Eloquent\Collection $mutasiInventarisJalan hasMany
   
 */
class InventarisJalan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'inventaris_jalan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'visible',
        'nama_barang',
        'kode_barang',
        'register',
        'kontruksi',
        'panjang',
        'lebar',
        'luas',
        'letak',
        'tanggal_dokument',
        'no_dokument',
        'status_tanah',
        'kode_tanah',
        'kondisi',
        'asal',
        'harga',
        'keterangan',
        'created_by',
        'updated_by',
        'status',
        'visible'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tanggal_dokument'];

    /**
     * mutasiInventarisJalans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mutasiInventarisJalans()
    {
        return $this->hasMany(MutasiInventarisJalan::class, 'id_inventaris_jalan');
    }
}

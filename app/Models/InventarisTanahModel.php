<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama_barang nama barang
@property varchar $kode_barang kode barang
@property varchar $register register
@property int $luas luas
@property year $tahun_pengadaan tahun pengadaan
@property varchar $letak letak
@property varchar $hak hak
@property varchar $no_sertifikat no sertifikat
@property date $tanggal_sertifikat tanggal sertifikat
@property varchar $penggunaan penggunaan
@property varchar $asal asal
@property double $harga harga
@property mediumtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $status status
@property int $visible visible
@property \Illuminate\Database\Eloquent\Collection $mutasiInventarisTanah hasMany
   
 */
class InventarisTanah extends Model
{

    /**
     * Database table name
     */
    protected $table = 'inventaris_tanah';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'visible',
        'nama_barang',
        'kode_barang',
        'register',
        'luas',
        'tahun_pengadaan',
        'letak',
        'hak',
        'no_sertifikat',
        'tanggal_sertifikat',
        'penggunaan',
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
    protected $dates = ['tanggal_sertifikat'];

    /**
     * mutasiInventarisTanahs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mutasiInventarisTanahs()
    {
        return $this->hasMany(MutasiInventarisTanah::class, 'id_inventaris_tanah');
    }
}

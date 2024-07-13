<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_barang nama barang
@property varchar $kode_barang kode barang
@property varchar $register register
@property varchar $kondisi_bangunan kondisi bangunan
@property varchar $kontruksi_bertingkat kontruksi bertingkat
@property tinyint $kontruksi_beton kontruksi beton
@property int $luas_bangunan luas bangunan
@property varchar $letak letak
@property date $tanggal_dokument tanggal dokument
@property varchar $no_dokument no dokument
@property int $luas luas
@property varchar $status_tanah status tanah
@property varchar $kode_tanah kode tanah
@property varchar $asal asal
@property double $harga harga
@property mediumtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $status status
@property int $visible visible
@property \Illuminate\Database\Eloquent\Collection $mutasiInventarisGedung hasMany
   
 */
class InventarisGedungModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'inventaris_gedung';

    /**
    * Mass assignable columns
    */
    protected $fillable=['visible',
'nama_barang',
'kode_barang',
'register',
'kondisi_bangunan',
'kontruksi_bertingkat',
'kontruksi_beton',
'luas_bangunan',
'letak',
'tanggal_dokument',
'no_dokument',
'luas',
'status_tanah',
'kode_tanah',
'asal',
'harga',
'keterangan',
'created_by',
'updated_by',
'status',
'visible'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_dokument'];

    /**
    * mutasiInventarisGedungs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function mutasiInventarisGedungs()
    {
        return $this->hasMany(MutasiInventarisGedung::class,'id_inventaris_gedung');
    }



}
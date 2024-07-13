<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_barang nama barang
@property varchar $kondisi_bangunan kondisi bangunan
@property varchar $kontruksi_bertingkat kontruksi bertingkat
@property tinyint $kontruksi_beton kontruksi beton
@property int $luas_bangunan luas bangunan
@property varchar $letak letak
@property date $tanggal_dokument tanggal dokument
@property varchar $no_dokument no dokument
@property date $tanggal tanggal
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
   
 */
class InventarisKontruksiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'inventaris_kontruksi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['visible',
'nama_barang',
'kondisi_bangunan',
'kontruksi_bertingkat',
'kontruksi_beton',
'luas_bangunan',
'letak',
'tanggal_dokument',
'no_dokument',
'tanggal',
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
    protected $dates=['tanggal_dokument',
'tanggal'];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id id
@property varchar $nama_barang nama barang
@property varchar $kode_barang kode barang
@property varchar $kondisi kondisi
@property longtext $keterangan keterangan
@property varchar $asal asal
@property decimal $tahun_pengadaan tahun pengadaan
   
 */
class MasterInventarisModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'master_inventaris';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tahun_pengadaan',
'nama_barang',
'kode_barang',
'kondisi',
'keterangan',
'asal',
'tahun_pengadaan'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
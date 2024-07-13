<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_inventaris_asset id inventaris asset
@property varchar $status_mutasi status mutasi
@property varchar $jenis_mutasi jenis mutasi
@property date $tahun_mutasi tahun mutasi
@property longtext $keterangan keterangan
   
 */
class RekapMutasiInventarisModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'rekap_mutasi_inventaris';

    /**
    * Mass assignable columns
    */
    protected $fillable=['keterangan',
'id_inventaris_asset',
'status_mutasi',
'jenis_mutasi',
'tahun_mutasi',
'keterangan'];

    /**
    * Date time columns.
    */
    protected $dates=['tahun_mutasi'];




}
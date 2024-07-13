<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $ID_Keg ID Keg
@property varchar $Nama_Kegiatan Nama Kegiatan
   
 */
class KeuanganManualRefKegiatanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_manual_ref_kegiatan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Nama_Kegiatan',
'ID_Keg',
'Nama_Kegiatan'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
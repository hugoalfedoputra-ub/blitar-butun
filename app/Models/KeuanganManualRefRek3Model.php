<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $Kelompok Kelompok
@property varchar $Jenis Jenis
@property varchar $Nama_Jenis Nama Jenis
   
 */
class KeuanganManualRefRek3Model extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_manual_ref_rek3';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Nama_Jenis',
'Kelompok',
'Jenis',
'Nama_Jenis'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $Akun Akun
@property varchar $Kelompok Kelompok
@property varchar $Nama_Kelompok Nama Kelompok
   
 */
class KeuanganManualRefRek2Model extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_manual_ref_rek2';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Nama_Kelompok',
'Akun',
'Kelompok',
'Nama_Kelompok'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
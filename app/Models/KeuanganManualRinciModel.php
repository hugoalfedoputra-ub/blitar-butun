<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $Tahun Tahun
@property varchar $Kd_Akun Kd Akun
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property decimal $Nilai_Anggaran Nilai Anggaran
@property decimal $Nilai_Realisasi Nilai Realisasi
   
 */
class KeuanganManualRinciModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_manual_rinci';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Nilai_Realisasi',
'Tahun',
'Kd_Akun',
'Kd_Keg',
'Kd_Rincian',
'Nilai_Anggaran',
'Nilai_Realisasi'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
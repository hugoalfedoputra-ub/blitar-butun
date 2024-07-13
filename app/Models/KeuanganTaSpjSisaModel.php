<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $No_Bukti No Bukti
@property varchar $Tgl_Bukti Tgl Bukti
@property varchar $No_SPJ No SPJ
@property varchar $Tgl_SPJ Tgl SPJ
@property varchar $No_SPP No SPP
@property varchar $Tgl_SPP Tgl SPP
@property varchar $Kd_Keg Kd Keg
@property text $keterangan keterangan
@property varchar $Nilai Nilai
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSpjSisaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_spj_sisa';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Nilai',
'id_keuangan_master',
'Tahun',
'Kd_Desa',
'No_Bukti',
'Tgl_Bukti',
'No_SPJ',
'Tgl_SPJ',
'No_SPP',
'Tgl_SPP',
'Kd_Keg',
'keterangan',
'Nilai'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idKeuanganMaster
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idKeuanganMaster()
    {
        return $this->belongsTo(KeuanganMaster::class,'id_keuangan_master');
    }




}
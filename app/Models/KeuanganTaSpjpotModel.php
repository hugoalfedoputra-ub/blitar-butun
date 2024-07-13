<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $No_SPJ No SPJ
@property varchar $Kd_Keg Kd Keg
@property varchar $No_Bukti No Bukti
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Nilai Nilai
@property varchar $Billing_Pajak Billing Pajak
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSpjpotModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_spjpot';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Billing_Pajak',
'id_keuangan_master',
'Tahun',
'Kd_Desa',
'No_SPJ',
'Kd_Keg',
'No_Bukti',
'Kd_Rincian',
'Nilai',
'Billing_Pajak'];

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
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_Bukti No Bukti
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $RincianSD RincianSD
@property varchar $SumberDana SumberDana
@property varchar $nilai nilai
@property varchar $Kd_SubRinci Kd SubRinci
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaTbpRinciModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_tbp_rinci';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Kd_SubRinci',
'id_keuangan_master',
'Tahun',
'No_Bukti',
'Kd_Desa',
'Kd_Keg',
'Kd_Rincian',
'RincianSD',
'SumberDana',
'nilai',
'Kd_SubRinci'];

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
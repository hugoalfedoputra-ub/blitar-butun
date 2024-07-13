<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Anggaran Anggaran
@property varchar $AnggaranPAK AnggaranPAK
@property varchar $AnggaranStlhPAK AnggaranStlhPAK
@property varchar $Kd_SubRinci Kd SubRinci
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRabModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_rab';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Kd_SubRinci',
'id_keuangan_master',
'Tahun',
'Kd_Desa',
'Kd_Keg',
'Kd_Rincian',
'Anggaran',
'AnggaranPAK',
'AnggaranStlhPAK',
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
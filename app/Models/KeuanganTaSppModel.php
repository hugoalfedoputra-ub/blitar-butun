<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_SPP No SPP
@property varchar $Tgl_SPP Tgl SPP
@property varchar $Jn_SPP Jn SPP
@property varchar $Kd_Desa Kd Desa
@property varchar $Keterangan Keterangan
@property varchar $Jumlah Jumlah
@property varchar $Potongan Potongan
@property varchar $Status Status
@property varchar $F10 F10
@property varchar $F11 F11
@property varchar $FF12 FF12
@property varchar $FF13 FF13
@property varchar $FF14 FF14
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSppModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_spp';

    /**
    * Mass assignable columns
    */
    protected $fillable=['FF14',
'id_keuangan_master',
'Tahun',
'No_SPP',
'Tgl_SPP',
'Jn_SPP',
'Kd_Desa',
'Keterangan',
'Jumlah',
'Potongan',
'Status',
'F10',
'F11',
'FF12',
'FF13',
'FF14'];

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
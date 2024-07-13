<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_SPJ No SPJ
@property varchar $Tgl_SPJ Tgl SPJ
@property varchar $Kd_Desa Kd Desa
@property varchar $No_SPP No SPP
@property varchar $Keterangan Keterangan
@property varchar $Jumlah Jumlah
@property varchar $Potongan Potongan
@property varchar $Status Status
@property varchar $Kunci Kunci
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSpjModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_spj';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Kunci',
'id_keuangan_master',
'Tahun',
'No_SPJ',
'Tgl_SPJ',
'Kd_Desa',
'No_SPP',
'Keterangan',
'Jumlah',
'Potongan',
'Status',
'Kunci'];

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
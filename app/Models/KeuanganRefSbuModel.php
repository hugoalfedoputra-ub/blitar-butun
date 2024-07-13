<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kode_SBU Kode SBU
@property varchar $NoUrut_SBU NoUrut SBU
@property varchar $Nama_SBU Nama SBU
@property varchar $Nilai Nilai
@property varchar $Satuan Satuan
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefSbuModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ref_sbu';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Satuan',
'id_keuangan_master',
'Kd_Rincian',
'Kode_SBU',
'NoUrut_SBU',
'Nama_SBU',
'Nilai',
'Satuan'];

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
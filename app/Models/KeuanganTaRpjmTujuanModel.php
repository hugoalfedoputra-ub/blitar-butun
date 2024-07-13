<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $ID_Tujuan ID Tujuan
@property varchar $Kd_Desa Kd Desa
@property varchar $ID_Misi ID Misi
@property varchar $No_Tujuan No Tujuan
@property varchar $Uraian_Tujuan Uraian Tujuan
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmTujuanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_rpjm_tujuan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Uraian_Tujuan',
'id_keuangan_master',
'ID_Tujuan',
'Kd_Desa',
'ID_Misi',
'No_Tujuan',
'Uraian_Tujuan'];

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
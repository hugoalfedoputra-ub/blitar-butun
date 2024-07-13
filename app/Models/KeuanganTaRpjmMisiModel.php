<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $ID_Misi ID Misi
@property varchar $Kd_Desa Kd Desa
@property varchar $ID_Visi ID Visi
@property varchar $No_Misi No Misi
@property varchar $Uraian_Misi Uraian Misi
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmMisiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_rpjm_misi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Uraian_Misi',
'id_keuangan_master',
'ID_Misi',
'Kd_Desa',
'ID_Visi',
'No_Misi',
'Uraian_Misi'];

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
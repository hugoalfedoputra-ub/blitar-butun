<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $ID_Sasaran ID Sasaran
@property varchar $Kd_Desa Kd Desa
@property varchar $ID_Tujuan ID Tujuan
@property varchar $No_Sasaran No Sasaran
@property varchar $Uraian_Sasaran Uraian Sasaran
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmSasaranModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_rpjm_sasaran';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Uraian_Sasaran',
'id_keuangan_master',
'ID_Sasaran',
'Kd_Desa',
'ID_Tujuan',
'No_Sasaran',
'Uraian_Sasaran'];

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
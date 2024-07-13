<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kelompok Kelompok
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefNeracaCloseModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ref_neraca_close';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Kelompok',
'id_keuangan_master',
'Kd_Rincian',
'Kelompok'];

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
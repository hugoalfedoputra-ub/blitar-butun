<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Akun Akun
@property varchar $Nama_Akun Nama Akun
@property varchar $NoLap NoLap
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefRek1Model extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ref_rek1';

    /**
    * Mass assignable columns
    */
    protected $fillable=['NoLap',
'id_keuangan_master',
'Akun',
'Nama_Akun',
'NoLap'];

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
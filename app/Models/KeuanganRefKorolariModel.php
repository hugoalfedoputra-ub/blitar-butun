<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kd_RekDB Kd RekDB
@property varchar $Kd_RekKD Kd RekKD
@property varchar $Jenis Jenis
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefKorolariModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ref_korolari';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Jenis',
'id_keuangan_master',
'Kd_Rincian',
'Kd_RekDB',
'Kd_RekKD',
'Jenis'];

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
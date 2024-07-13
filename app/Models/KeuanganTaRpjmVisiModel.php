<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $ID_Visi ID Visi
@property varchar $Kd_Desa Kd Desa
@property varchar $No_Visi No Visi
@property varchar $No_RPJM No RPJM
@property varchar $Tgl_RPJM Tgl RPJM
@property varchar $Uraian_Visi Uraian Visi
@property varchar $TahunA TahunA
@property varchar $TahunN TahunN
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmVisiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_rpjm_visi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['TahunN',
'id_keuangan_master',
'ID_Visi',
'Kd_Desa',
'No_Visi',
'No_RPJM',
'Tgl_RPJM',
'Uraian_Visi',
'TahunA',
'TahunN'];

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
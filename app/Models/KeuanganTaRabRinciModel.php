<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kd_SubRinci Kd SubRinci
@property varchar $No_Urut No Urut
@property varchar $SumberDana SumberDana
@property varchar $Uraian Uraian
@property varchar $Satuan Satuan
@property varchar $JmlSatuan JmlSatuan
@property varchar $HrgSatuan HrgSatuan
@property varchar $Anggaran Anggaran
@property varchar $JmlSatuanPAK JmlSatuanPAK
@property varchar $HrgSatuanPAK HrgSatuanPAK
@property varchar $AnggaranStlhPAK AnggaranStlhPAK
@property varchar $AnggaranPAK AnggaranPAK
@property varchar $Kode_SBU Kode SBU
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRabRinciModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_rab_rinci';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Kode_SBU',
'id_keuangan_master',
'Tahun',
'Kd_Desa',
'Kd_Keg',
'Kd_Rincian',
'Kd_SubRinci',
'No_Urut',
'SumberDana',
'Uraian',
'Satuan',
'JmlSatuan',
'HrgSatuan',
'Anggaran',
'JmlSatuanPAK',
'HrgSatuanPAK',
'AnggaranStlhPAK',
'AnggaranPAK',
'Kode_SBU'];

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
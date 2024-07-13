<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $KdPosting KdPosting
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kd_SubRinci Kd SubRinci
@property varchar $No_Urut No Urut
@property varchar $Uraian Uraian
@property varchar $SumberDana SumberDana
@property varchar $JmlSatuan JmlSatuan
@property varchar $HrgSatuan HrgSatuan
@property varchar $Satuan Satuan
@property varchar $Anggaran Anggaran
@property varchar $JmlSatuanPAK JmlSatuanPAK
@property varchar $HrgSatuanPAK HrgSatuanPAK
@property varchar $AnggaranStlhPAK AnggaranStlhPAK
@property varchar $AnggaranPAK AnggaranPAK
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaAnggaranRinciModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_anggaran_rinci';

    /**
    * Mass assignable columns
    */
    protected $fillable=['AnggaranPAK',
'id_keuangan_master',
'KdPosting',
'Tahun',
'Kd_Desa',
'Kd_Keg',
'Kd_Rincian',
'Kd_SubRinci',
'No_Urut',
'Uraian',
'SumberDana',
'JmlSatuan',
'HrgSatuan',
'Satuan',
'Anggaran',
'JmlSatuanPAK',
'HrgSatuanPAK',
'AnggaranStlhPAK',
'AnggaranPAK'];

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
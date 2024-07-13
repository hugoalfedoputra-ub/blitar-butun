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
@property varchar $Nama_SubRinci Nama SubRinci
@property varchar $Anggaran Anggaran
@property varchar $AnggaranPAK AnggaranPAK
@property varchar $AnggaranStlhPAK AnggaranStlhPAK
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRabSub extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_rab_sub';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'AnggaranStlhPAK',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'Kd_Keg',
        'Kd_Rincian',
        'Kd_SubRinci',
        'Nama_SubRinci',
        'Anggaran',
        'AnggaranPAK',
        'AnggaranStlhPAK'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idKeuanganMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idKeuanganMaster()
    {
        return $this->belongsTo(KeuanganMaster::class, 'id_keuangan_master');
    }
}

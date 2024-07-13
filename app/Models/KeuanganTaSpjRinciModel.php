<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_SPJ No SPJ
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Sumberdana Sumberdana
@property varchar $Kd_Desa Kd Desa
@property varchar $No_SPP No SPP
@property varchar $JmlCair JmlCair
@property varchar $Nilai Nilai
@property varchar $Alamat Alamat
@property varchar $Sisa Sisa
@property varchar $Kd_SubRinci Kd SubRinci
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSpjRinci extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_spj_rinci';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kd_SubRinci',
        'id_keuangan_master',
        'Tahun',
        'No_SPJ',
        'Kd_Keg',
        'Kd_Rincian',
        'Sumberdana',
        'Kd_Desa',
        'No_SPP',
        'JmlCair',
        'Nilai',
        'Alamat',
        'Sisa',
        'Kd_SubRinci'
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

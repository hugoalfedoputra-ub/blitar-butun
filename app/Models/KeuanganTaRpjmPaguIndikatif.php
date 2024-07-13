<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Sumber Kd Sumber
@property varchar $Tahun1 Tahun1
@property varchar $Tahun2 Tahun2
@property varchar $Tahun3 Tahun3
@property varchar $Tahun4 Tahun4
@property varchar $Tahun5 Tahun5
@property varchar $Tahun6 Tahun6
@property varchar $Pola Pola
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmPaguIndikatif extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_rpjm_pagu_indikatif';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Pola',
        'id_keuangan_master',
        'Kd_Desa',
        'Kd_Keg',
        'Kd_Sumber',
        'Tahun1',
        'Tahun2',
        'Tahun3',
        'Tahun4',
        'Tahun5',
        'Tahun6',
        'Pola'
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

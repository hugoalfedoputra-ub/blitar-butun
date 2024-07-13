<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $No_Bukti No Bukti
@property varchar $No_TBP No TBP
@property varchar $Uraian Uraian
@property varchar $Nilai Nilai
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaStsRinci extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_sts_rinci';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nilai',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'No_Bukti',
        'No_TBP',
        'Uraian',
        'Nilai'
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

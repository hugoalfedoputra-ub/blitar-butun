<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $NoBukti NoBukti
@property varchar $Kd_Keg Kd Keg
@property varchar $RincianSD RincianSD
@property varchar $NoID NoID
@property varchar $Kd_Desa Kd Desa
@property varchar $Akun Akun
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Sumberdana Sumberdana
@property varchar $DK DK
@property varchar $Debet Debet
@property varchar $Kredit Kredit
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaJurnalUmumRinci extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_jurnal_umum_rinci';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kredit',
        'id_keuangan_master',
        'Tahun',
        'NoBukti',
        'Kd_Keg',
        'RincianSD',
        'NoID',
        'Kd_Desa',
        'Akun',
        'Kd_Rincian',
        'Sumberdana',
        'DK',
        'Debet',
        'Kredit'
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

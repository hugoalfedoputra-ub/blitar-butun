<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $KdPosting KdPosting
@property varchar $Tahun Tahun
@property varchar $KURincianSD KURincianSD
@property varchar $KD_Rincian KD Rincian
@property varchar $RincianSD RincianSD
@property varchar $Anggaran Anggaran
@property varchar $AnggaranPAK AnggaranPAK
@property varchar $AnggaranStlhPAK AnggaranStlhPAK
@property varchar $Belanja Belanja
@property varchar $Kd_keg Kd keg
@property varchar $SumberDana SumberDana
@property varchar $Kd_Desa Kd Desa
@property varchar $TglPosting TglPosting
@property varchar $Kd_SubRinci Kd SubRinci
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaAnggaran extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_anggaran';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kd_SubRinci',
        'id_keuangan_master',
        'KdPosting',
        'Tahun',
        'KURincianSD',
        'KD_Rincian',
        'RincianSD',
        'Anggaran',
        'AnggaranPAK',
        'AnggaranStlhPAK',
        'Belanja',
        'Kd_keg',
        'SumberDana',
        'Kd_Desa',
        'TglPosting',
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

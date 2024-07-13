<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Bid Kd Bid
@property varchar $Kd_Keg Kd Keg
@property varchar $ID_Keg ID Keg
@property varchar $Nama_Kegiatan Nama Kegiatan
@property varchar $Pagu Pagu
@property varchar $Pagu_PAK Pagu PAK
@property varchar $Nm_PPTKD Nm PPTKD
@property varchar $NIP_PPTKD NIP PPTKD
@property varchar $Lokasi Lokasi
@property varchar $Waktu Waktu
@property varchar $Keluaran Keluaran
@property varchar $Sumberdana Sumberdana
@property varchar $Jbt_PPTKD Jbt PPTKD
@property varchar $Kd_Sub Kd Sub
@property varchar $Nilai Nilai
@property varchar $NilaiPAK NilaiPAK
@property varchar $Satuan Satuan
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaKegiatan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_kegiatan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Satuan',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'Kd_Bid',
        'Kd_Keg',
        'ID_Keg',
        'Nama_Kegiatan',
        'Pagu',
        'Pagu_PAK',
        'Nm_PPTKD',
        'NIP_PPTKD',
        'Lokasi',
        'Waktu',
        'Keluaran',
        'Sumberdana',
        'Jbt_PPTKD',
        'Kd_Sub',
        'Nilai',
        'NilaiPAK',
        'Satuan'
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Bid Kd Bid
@property varchar $Kd_Keg Kd Keg
@property varchar $ID_Keg ID Keg
@property varchar $Nama_Kegiatan Nama Kegiatan
@property varchar $Lokasi Lokasi
@property varchar $Keluaran Keluaran
@property varchar $Kd_Sas Kd Sas
@property varchar $Sasaran Sasaran
@property varchar $Tahun1 Tahun1
@property varchar $Tahun2 Tahun2
@property varchar $Tahun3 Tahun3
@property varchar $Tahun4 Tahun4
@property varchar $Tahun5 Tahun5
@property varchar $Tahun6 Tahun6
@property varchar $Swakelola Swakelola
@property varchar $Kerjasama Kerjasama
@property varchar $Pihak_Ketiga Pihak Ketiga
@property varchar $Sumberdana Sumberdana
@property varchar $Kd_Sub Kd Sub
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmKegiatan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_rpjm_kegiatan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kd_Sub',
        'id_keuangan_master',
        'Kd_Desa',
        'Kd_Bid',
        'Kd_Keg',
        'ID_Keg',
        'Nama_Kegiatan',
        'Lokasi',
        'Keluaran',
        'Kd_Sas',
        'Sasaran',
        'Tahun1',
        'Tahun2',
        'Tahun3',
        'Tahun4',
        'Tahun5',
        'Tahun6',
        'Swakelola',
        'Kerjasama',
        'Pihak_Ketiga',
        'Sumberdana',
        'Kd_Sub'
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

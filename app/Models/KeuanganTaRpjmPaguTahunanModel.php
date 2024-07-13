<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Tahun Kd Tahun
@property varchar $Kd_Sumber Kd Sumber
@property varchar $Biaya Biaya
@property varchar $Volume Volume
@property varchar $Satuan Satuan
@property varchar $Lokasi_Spesifik Lokasi Spesifik
@property varchar $Jml_Sas_Pria Jml Sas Pria
@property varchar $Jml_Sas_Wanita Jml Sas Wanita
@property varchar $Jml_Sas_ARTM Jml Sas ARTM
@property varchar $Waktu Waktu
@property varchar $Mulai Mulai
@property varchar $Selesai Selesai
@property varchar $Pola_Kegiatan Pola Kegiatan
@property varchar $Pelaksana Pelaksana
@property varchar $No_ID No ID
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaRpjmPaguTahunan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_rpjm_pagu_tahunan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'No_ID',
        'id_keuangan_master',
        'Kd_Desa',
        'Kd_Keg',
        'Kd_Tahun',
        'Kd_Sumber',
        'Biaya',
        'Volume',
        'Satuan',
        'Lokasi_Spesifik',
        'Jml_Sas_Pria',
        'Jml_Sas_Wanita',
        'Jml_Sas_ARTM',
        'Waktu',
        'Mulai',
        'Selesai',
        'Pola_Kegiatan',
        'Pelaksana',
        'No_ID'
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

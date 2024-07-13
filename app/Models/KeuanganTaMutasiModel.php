<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $No_Bukti No Bukti
@property varchar $Tgl_Bukti Tgl Bukti
@property varchar $Keterangan Keterangan
@property varchar $Kd_Bank Kd Bank
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kd_Keg Kd Keg
@property varchar $Sumberdana Sumberdana
@property varchar $Kd_Mutasi Kd Mutasi
@property varchar $Nilai Nilai
@property varchar $ID_Bank ID Bank
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaMutasi extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_mutasi';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'ID_Bank',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'No_Bukti',
        'Tgl_Bukti',
        'Keterangan',
        'Kd_Bank',
        'Kd_Rincian',
        'Kd_Keg',
        'Sumberdana',
        'Kd_Mutasi',
        'Nilai',
        'ID_Bank'
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

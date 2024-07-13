<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_SPJ No SPJ
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $No_Bukti No Bukti
@property varchar $Tgl_Bukti Tgl Bukti
@property varchar $Sumberdana Sumberdana
@property varchar $Kd_Desa Kd Desa
@property varchar $Nm_Penerima Nm Penerima
@property varchar $Alamat Alamat
@property varchar $Rek_Bank Rek Bank
@property varchar $Nm_Bank Nm Bank
@property varchar $NPWP NPWP
@property varchar $Keterangan Keterangan
@property varchar $Nilai Nilai
@property varchar $Kd_SubRinci Kd SubRinci
@property varchar $Kd_Bank Kd Bank
@property varchar $Ref_Bayar Ref Bayar
@property varchar $Tgl_Bayar Tgl Bayar
@property varchar $Validasi Validasi
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSpjBukti extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_spj_bukti';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Validasi',
        'id_keuangan_master',
        'Tahun',
        'No_SPJ',
        'Kd_Keg',
        'Kd_Rincian',
        'No_Bukti',
        'Tgl_Bukti',
        'Sumberdana',
        'Kd_Desa',
        'Nm_Penerima',
        'Alamat',
        'Rek_Bank',
        'Nm_Bank',
        'NPWP',
        'Keterangan',
        'Nilai',
        'Kd_SubRinci',
        'Kd_Bank',
        'Ref_Bayar',
        'Tgl_Bayar',
        'Validasi'
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

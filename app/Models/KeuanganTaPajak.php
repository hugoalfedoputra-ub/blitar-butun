<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $No_SSP No SSP
@property varchar $Tgl_SSP Tgl SSP
@property varchar $Keterangan Keterangan
@property varchar $Nama_WP Nama WP
@property varchar $Alamat_WP Alamat WP
@property varchar $NPWP NPWP
@property varchar $Kd_MAP Kd MAP
@property varchar $Nm_Penyetor Nm Penyetor
@property varchar $Jn_Transaksi Jn Transaksi
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Jumlah Jumlah
@property varchar $KdBayar KdBayar
@property varchar $ID_Bank ID Bank
@property varchar $NTPN NTPN
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaPajak extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_pajak';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'NTPN',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'No_SSP',
        'Tgl_SSP',
        'Keterangan',
        'Nama_WP',
        'Alamat_WP',
        'NPWP',
        'Kd_MAP',
        'Nm_Penyetor',
        'Jn_Transaksi',
        'Kd_Rincian',
        'Jumlah',
        'KdBayar',
        'ID_Bank',
        'NTPN'
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

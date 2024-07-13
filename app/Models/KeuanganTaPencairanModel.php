<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_Cek No Cek
@property varchar $No_SPP No SPP
@property varchar $Tgl_Cek Tgl Cek
@property varchar $Kd_Desa Kd Desa
@property varchar $Keterangan Keterangan
@property varchar $Jumlah Jumlah
@property varchar $Potongan Potongan
@property varchar $KdBayar KdBayar
@property varchar $ID_Bank ID Bank
@property varchar $Kunci Kunci
@property varchar $No_Ref No Ref
@property varchar $Tgl_Bayar Tgl Bayar
@property varchar $Validasi Validasi
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaPencairan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_pencairan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Validasi',
        'id_keuangan_master',
        'Tahun',
        'No_Cek',
        'No_SPP',
        'Tgl_Cek',
        'Kd_Desa',
        'Keterangan',
        'Jumlah',
        'Potongan',
        'KdBayar',
        'ID_Bank',
        'Kunci',
        'No_Ref',
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

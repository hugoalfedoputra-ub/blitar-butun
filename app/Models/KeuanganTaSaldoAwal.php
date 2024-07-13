<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Jenis Jenis
@property varchar $Anggaran Anggaran
@property varchar $Debet Debet
@property varchar $Kredit Kredit
@property varchar $Tgl_Bukti Tgl Bukti
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaSaldoAwal extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_saldo_awal';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Tgl_Bukti',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'Kd_Rincian',
        'Jenis',
        'Anggaran',
        'Debet',
        'Kredit',
        'Tgl_Bukti'
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

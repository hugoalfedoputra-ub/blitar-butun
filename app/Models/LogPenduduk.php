<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_pend id pend
@property int $kode_peristiwa kode peristiwa
@property varchar $meninggal_di meninggal di
@property varchar $jam_mati jam mati
@property varchar $sebab sebab
@property varchar $penolong_mati penolong mati
@property varchar $akta_mati akta mati
@property tinytext $alamat_tujuan alamat tujuan
@property timestamp $tgl_lapor tgl lapor
@property datetime $tgl_peristiwa tgl peristiwa
@property text $catatan catatan
@property varchar $no_kk no kk
@property varchar $nama_kk nama kk
@property tinyint $ref_pindah ref pindah
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property varchar $maksud_tujuan_kedatangan maksud tujuan kedatangan
@property RefPindah $refPindah belongsTo
@property \Illuminate\Database\Eloquent\Collection $logKeluarga hasMany
   
 */
class LogPenduduk extends Model
{

    /**
     * Database table name
     */
    protected $table = 'log_penduduk';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'maksud_tujuan_kedatangan',
        'id_pend',
        'kode_peristiwa',
        'meninggal_di',
        'jam_mati',
        'sebab',
        'penolong_mati',
        'akta_mati',
        'alamat_tujuan',
        'tgl_lapor',
        'tgl_peristiwa',
        'catatan',
        'no_kk',
        'nama_kk',
        'ref_pindah',
        'created_by',
        'updated_by',
        'maksud_tujuan_kedatangan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'tgl_lapor',
        'tgl_peristiwa'
    ];

    /**
     * refPindah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function refPindah()
    {
        return $this->belongsTo(RefPindah::class, 'ref_pindah');
    }

    /**
     * logKeluargas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logKeluargas()
    {
        return $this->hasMany(LogKeluarga::class, 'id_log_penduduk');
    }
}

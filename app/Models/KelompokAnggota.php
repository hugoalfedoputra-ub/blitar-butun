<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_kelompok id kelompok
@property int $id_penduduk id penduduk
@property varchar $no_anggota no anggota
@property text $keterangan keterangan
@property varchar $jabatan jabatan
@property varchar $no_sk_jabatan no sk jabatan
@property varchar $tipe tipe
@property varchar $periode periode
@property varchar $nmr_sk_pengangkatan nmr sk pengangkatan
@property date $tgl_sk_pengangkatan tgl sk pengangkatan
@property varchar $nmr_sk_pemberhentian nmr sk pemberhentian
@property date $tgl_sk_pemberhentian tgl sk pemberhentian
@property IdKelompok $kelompok belongsTo
   
 */
class KelompokAnggota extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kelompok_anggota';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'tgl_sk_pemberhentian',
        'id_kelompok',
        'id_penduduk',
        'no_anggota',
        'keterangan',
        'jabatan',
        'no_sk_jabatan',
        'tipe',
        'periode',
        'nmr_sk_pengangkatan',
        'tgl_sk_pengangkatan',
        'nmr_sk_pemberhentian',
        'tgl_sk_pemberhentian'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'tgl_sk_pengangkatan',
        'tgl_sk_pemberhentian'
    ];

    /**
     * idKelompok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idKelompok()
    {
        return $this->belongsTo(Kelompok::class, 'id_kelompok');
    }
}

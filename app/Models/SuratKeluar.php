<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property smallint $nomor_urut nomor urut
@property varchar $nomor_surat nomor surat
@property varchar $kode_surat kode surat
@property date $tanggal_surat tanggal surat
@property timestamp $tanggal_catat tanggal catat
@property varchar $tujuan tujuan
@property varchar $isi_singkat isi singkat
@property varchar $berkas_scan berkas scan
@property tinyint $ekspedisi ekspedisi
@property date $tanggal_pengiriman tanggal pengiriman
@property varchar $tanda_terima tanda terima
@property varchar $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property varchar $lokasi_arsip lokasi arsip
   
 */
class SuratKeluar extends Model
{

    /**
     * Database table name
     */
    protected $table = 'surat_keluar';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'lokasi_arsip',
        'nomor_urut',
        'nomor_surat',
        'kode_surat',
        'tanggal_surat',
        'tanggal_catat',
        'tujuan',
        'isi_singkat',
        'berkas_scan',
        'ekspedisi',
        'tanggal_pengiriman',
        'tanda_terima',
        'keterangan',
        'created_by',
        'updated_by',
        'lokasi_arsip'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'tanggal_surat',
        'tanggal_catat',
        'tanggal_pengiriman'
    ];
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_format_surat id format surat
@property int $id_pend id pend
@property int $id_pamong id pamong
@property varchar $nama_pamong nama pamong
@property varchar $nama_jabatan nama jabatan
@property int $id_user id user
@property timestamp $tanggal tanggal
@property varchar $bulan bulan
@property varchar $tahun tahun
@property varchar $no_surat no surat
@property varchar $nama_surat nama surat
@property varchar $lampiran lampiran
@property decimal $nik_non_warga nik non warga
@property varchar $nama_non_warga nama non warga
@property varchar $keterangan keterangan
@property varchar $lokasi_arsip lokasi arsip
@property int $urls_id urls id
@property tinyint $status status
@property varchar $log_verifikasi log verifikasi
@property tinyint $tte tte
@property tinyint $verifikasi_operator verifikasi operator
@property tinyint $verifikasi_kades verifikasi kades
@property tinyint $verifikasi_sekdes verifikasi sekdes
@property longtext $isi_surat isi surat
@property tinyint $kecamatan kecamatan
@property datetime $deleted_at deleted at
   
 */
class LogSuratModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'log_surat';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_format_surat',
'id_pend',
'id_pamong',
'nama_pamong',
'nama_jabatan',
'id_user',
'tanggal',
'bulan',
'tahun',
'no_surat',
'nama_surat',
'lampiran',
'nik_non_warga',
'nama_non_warga',
'keterangan',
'lokasi_arsip',
'urls_id',
'status',
'log_verifikasi',
'tte',
'verifikasi_operator',
'verifikasi_kades',
'verifikasi_sekdes',
'isi_surat',
'kecamatan'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal'];




}
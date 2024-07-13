<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $kode kode
@property varchar $judul judul
@property varchar $jenis jenis
@property mediumtext $isi isi
@property varchar $server server
@property timestamp $tgl_berikutnya tgl berikutnya
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property smallint $frekuensi frekuensi
@property varchar $aksi aksi
@property tinyint $aktif aktif
   
 */
class Notifikasi extends Model
{

    /**
     * Database table name
     */
    protected $table = 'notifikasi';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'aktif',
        'kode',
        'judul',
        'jenis',
        'isi',
        'server',
        'tgl_berikutnya',
        'updated_by',
        'frekuensi',
        'aksi',
        'aktif'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tgl_berikutnya'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $vaksin_1 vaksin 1
@property date $tgl_vaksin_1 tgl vaksin 1
@property varchar $dokumen_vaksin_1 dokumen vaksin 1
@property varchar $jenis_vaksin_1 jenis vaksin 1
@property int $vaksin_2 vaksin 2
@property date $tgl_vaksin_2 tgl vaksin 2
@property varchar $dokumen_vaksin_2 dokumen vaksin 2
@property varchar $jenis_vaksin_2 jenis vaksin 2
@property int $vaksin_3 vaksin 3
@property date $tgl_vaksin_3 tgl vaksin 3
@property varchar $dokumen_vaksin_3 dokumen vaksin 3
@property varchar $jenis_vaksin_3 jenis vaksin 3
@property int $tunda tunda
@property tinytext $keterangan keterangan
@property varchar $surat_dokter surat dokter
   
 */
class Covid19Vaksin extends Model
{

    /**
     * Database table name
     */
    protected $table = 'covid19_vaksin';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'surat_dokter',
        'vaksin_1',
        'tgl_vaksin_1',
        'dokumen_vaksin_1',
        'jenis_vaksin_1',
        'vaksin_2',
        'tgl_vaksin_2',
        'dokumen_vaksin_2',
        'jenis_vaksin_2',
        'vaksin_3',
        'tgl_vaksin_3',
        'dokumen_vaksin_3',
        'jenis_vaksin_3',
        'tunda',
        'keterangan',
        'surat_dokter'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'tgl_vaksin_1',
        'tgl_vaksin_2',
        'tgl_vaksin_3'
    ];
}

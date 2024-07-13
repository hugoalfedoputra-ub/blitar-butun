<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $kode kode
@property varchar $nama nama
@property longtext $uraian uraian
@property int $enabled enabled
   
 */
class KlasifikasiSurat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'klasifikasi_surat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'enabled',
        'kode',
        'nama',
        'uraian',
        'enabled'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

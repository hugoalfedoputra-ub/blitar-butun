<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property date $tanggal tanggal
@property text $keterangan keterangan
   
 */
class KehadiranHariLibur extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kehadiran_hari_libur';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'keterangan',
        'tanggal',
        'keterangan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tanggal'];
}

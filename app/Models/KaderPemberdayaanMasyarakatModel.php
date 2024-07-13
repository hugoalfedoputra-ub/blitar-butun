<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $penduduk_id penduduk id
@property text $kursus kursus
@property text $bidang bidang
@property text $keterangan keterangan
   
 */
class KaderPemberdayaanMasyarakat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kader_pemberdayaan_masyarakat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'keterangan',
        'penduduk_id',
        'kursus',
        'bidang',
        'keterangan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $alasan alasan
@property text $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class KehadiranAlasanKeluar extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kehadiran_alasan_keluar';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'alasan',
        'keterangan',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

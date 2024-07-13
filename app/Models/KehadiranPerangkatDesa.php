<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property date $tanggal tanggal
@property int $pamong_id pamong id
@property time $jam_masuk jam masuk
@property time $jam_keluar jam keluar
@property varchar $status_kehadiran status kehadiran
   
 */
class KehadiranPerangkatDesa extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kehadiran_perangkat_desa';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'status_kehadiran',
        'tanggal',
        'pamong_id',
        'jam_masuk',
        'jam_keluar',
        'status_kehadiran'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'tanggal',
        'jam_masuk',
        'jam_keluar'
    ];
}

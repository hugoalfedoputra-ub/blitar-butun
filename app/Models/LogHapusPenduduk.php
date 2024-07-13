<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_pend id pend
@property decimal $nik nik
@property varchar $foto foto
@property varchar $deleted_by deleted by
@property timestamp $deleted_at deleted at
   
 */
class LogHapusPenduduk extends Model
{

    /**
     * Database table name
     */
    protected $table = 'log_hapus_penduduk';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_pend',
        'nik',
        'foto',
        'deleted_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

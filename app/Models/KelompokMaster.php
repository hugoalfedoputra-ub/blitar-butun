<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $kelompok kelompok
@property varchar $deskripsi deskripsi
@property varchar $tipe tipe
   
 */
class KelompokMaster extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kelompok_master';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'tipe',
        'kelompok',
        'deskripsi',
        'tipe'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property text $nama nama
   
 */
class RefAsalTanahKas extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_asal_tanah_kas';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'nama',
        'nama'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $inisial inisial
   
 */
class RefPendudukBahasa extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_penduduk_bahasa';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'inisial',
        'nama',
        'inisial'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $ref_syarat_nama ref syarat nama
   
 */
class RefSyaratSurat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_syarat_surat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'ref_syarat_nama',
        'ref_syarat_nama'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

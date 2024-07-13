<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
   
 */
class RefDokumen extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_dokumen';

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

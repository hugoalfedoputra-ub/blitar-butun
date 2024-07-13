<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property text $ndesc ndesc
   
 */
class RefPersilMutasi extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_persil_mutasi';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'ndesc',
        'nama',
        'ndesc'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

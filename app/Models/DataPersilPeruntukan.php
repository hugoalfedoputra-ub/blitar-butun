<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property mediumtext $ndesc ndesc
   
 */
class DataPersilPeruntukan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'data_persil_peruntukan';

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $tipe tipe
@property varchar $kode kode
@property text $ndesc ndesc
   
 */
class RefPersilKelas extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_persil_kelas';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'ndesc',
        'tipe',
        'kode',
        'ndesc'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

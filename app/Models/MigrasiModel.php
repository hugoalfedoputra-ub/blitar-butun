<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $versi_database versi database
@property text $premium premium
   
 */
class Migrasi extends Model
{

    /**
     * Database table name
     */
    protected $table = 'migrasi';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'premium',
        'versi_database',
        'premium'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

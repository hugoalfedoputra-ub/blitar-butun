<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $simbol simbol
@property int $tipe tipe
@property int $parrent parrent
@property int $enabled enabled
   
 */
class Point extends Model
{

    /**
     * Database table name
     */
    protected $table = 'point';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'enabled',
        'nama',
        'simbol',
        'tipe',
        'parrent',
        'enabled'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

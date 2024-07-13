<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $simbol simbol
@property varchar $color color
@property int $tipe tipe
@property int $tebal tebal
@property varchar $jenis jenis
@property int $parrent parrent
@property int $enabled enabled
   
 */
class Line extends Model
{

    /**
     * Database table name
     */
    protected $table = 'line';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'enabled',
        'nama',
        'simbol',
        'color',
        'tipe',
        'tebal',
        'jenis',
        'parrent',
        'enabled'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

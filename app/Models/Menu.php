<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $link link
@property int $parrent parrent
@property tinyint $link_tipe link tipe
@property tinyint $enabled enabled
@property int $urut urut
   
 */
class Menu extends Model
{

    /**
     * Database table name
     */
    protected $table = 'menu';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'urut',
        'nama',
        'link',
        'parrent',
        'link_tipe',
        'enabled',
        'urut'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

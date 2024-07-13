<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property text $gambar gambar
@property text $link link
@property varchar $nama nama
@property tinyint $tipe tipe
@property int $enabled enabled
   
 */
class MediaSosial extends Model
{

    /**
     * Database table name
     */
    protected $table = 'media_sosial';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'enabled',
        'gambar',
        'link',
        'nama',
        'tipe',
        'enabled'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

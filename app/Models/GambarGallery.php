<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $parrent parrent
@property varchar $gambar gambar
@property varchar $nama nama
@property int $enabled enabled
@property timestamp $tgl_upload tgl upload
@property int $tipe tipe
@property tinyint $slider slider
@property int $urut urut
   
 */
class GambarGallery extends Model
{

    /**
     * Database table name
     */
    protected $table = 'gambar_gallery';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'urut',
        'parrent',
        'gambar',
        'nama',
        'enabled',
        'tgl_upload',
        'tipe',
        'slider',
        'urut'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tgl_upload'];
}

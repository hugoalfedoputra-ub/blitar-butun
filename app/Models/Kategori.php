<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $kategori kategori
@property int $tipe tipe
@property tinyint $urut urut
@property tinyint $enabled enabled
@property tinyint $parrent parrent
@property varchar $slug slug
   
 */
class Kategori extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kategori';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'slug',
        'kategori',
        'tipe',
        'urut',
        'enabled',
        'parrent',
        'slug'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

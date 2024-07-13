<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property mediumtext $path path
@property int $enabled enabled
@property int $ref_line ref line
@property varchar $foto foto
@property mediumtext $desk desk
@property int $id_cluster id cluster
   
 */
class Garis extends Model
{

    /**
     * Database table name
     */
    protected $table = 'garis';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_cluster',
        'nama',
        'path',
        'enabled',
        'ref_line',
        'foto',
        'desk',
        'id_cluster'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

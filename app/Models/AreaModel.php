<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property mediumtext $path path
@property int $enabled enabled
@property int $ref_polygon ref polygon
@property varchar $foto foto
@property int $id_cluster id cluster
@property mediumtext $desk desk
   
 */
class AreaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'area';

    /**
    * Mass assignable columns
    */
    protected $fillable=['desk',
'nama',
'path',
'enabled',
'ref_polygon',
'foto',
'id_cluster',
'desk'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
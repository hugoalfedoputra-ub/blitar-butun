<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property mediumtext $desk desk
@property varchar $nama nama
@property int $enabled enabled
@property varchar $lat lat
@property varchar $lng lng
@property int $ref_point ref point
@property varchar $foto foto
@property int $id_cluster id cluster
   
 */
class LokasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'lokasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_cluster',
'desk',
'nama',
'enabled',
'lat',
'lng',
'ref_point',
'foto',
'id_cluster'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property varchar $simbol simbol
@property varchar $color color
@property int $tipe tipe
@property int $parrent parrent
@property int $enabled enabled
   
 */
class PolygonModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'polygon';

    /**
    * Mass assignable columns
    */
    protected $fillable=['enabled',
'nama',
'simbol',
'color',
'tipe',
'parrent',
'enabled'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $lat lat
@property varchar $lng lng
   
 */
class TwebPendudukMap extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_map';

    /**
    * Mass assignable columns
    */
    protected $fillable=['lng',
'lat',
'lng'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
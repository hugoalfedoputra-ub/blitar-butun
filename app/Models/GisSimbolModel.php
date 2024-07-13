<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $simbol simbol
   
 */
class GisSimbolModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'gis_simbol';

    /**
    * Mass assignable columns
    */
    protected $fillable=['simbol',
'simbol'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebPendudukStatus extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_status';

    /**
    * Mass assignable columns
    */
    protected $fillable=['nama',
'nama'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
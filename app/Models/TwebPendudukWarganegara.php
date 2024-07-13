<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebPendudukWarganegara extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_warganegara';

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
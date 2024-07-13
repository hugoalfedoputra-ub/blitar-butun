<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebPendudukKawin extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_kawin';

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
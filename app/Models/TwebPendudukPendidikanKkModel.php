<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebPendudukPendidikanKk extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_pendidikan_kk';

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
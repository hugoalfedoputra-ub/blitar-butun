<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebPendudukAsuransi extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_asuransi';

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
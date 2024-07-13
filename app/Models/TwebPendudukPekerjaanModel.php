<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebPendudukPekerjaanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_pekerjaan';

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
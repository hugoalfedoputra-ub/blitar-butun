<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class RefPendudukHamilModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'ref_penduduk_hamil';

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
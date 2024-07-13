<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebKeluargaSejahtera extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_keluarga_sejahtera';

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
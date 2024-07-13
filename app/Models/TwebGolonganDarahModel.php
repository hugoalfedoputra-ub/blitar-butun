<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebGolonganDarah extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_golongan_darah';

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
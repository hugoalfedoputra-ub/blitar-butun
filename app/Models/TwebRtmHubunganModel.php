<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
   
 */
class TwebRtmHubungan extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_rtm_hubungan';

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
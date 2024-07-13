<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property tinyint $sex sex
   
 */
class TwebCaraKb extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_cara_kb';

    /**
    * Mass assignable columns
    */
    protected $fillable=['sex',
'nama',
'sex'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
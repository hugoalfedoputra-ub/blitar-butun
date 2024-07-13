<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $modul modul
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class LogSinkronisasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'log_sinkronisasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'modul',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
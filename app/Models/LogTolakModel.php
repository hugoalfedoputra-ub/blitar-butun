<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_surat id surat
@property longtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class LogTolakModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'log_tolak';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'id_surat',
'keterangan',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
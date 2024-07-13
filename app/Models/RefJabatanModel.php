<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property longtext $tupoksi tupoksi
@property tinyint $jenis jenis
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class RefJabatanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'ref_jabatan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'nama',
'tupoksi',
'jenis',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
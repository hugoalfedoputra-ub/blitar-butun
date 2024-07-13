<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $suku suku
@property text $deskripsi deskripsi
   
 */
class RefPendudukSukuModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'ref_penduduk_suku';

    /**
    * Mass assignable columns
    */
    protected $fillable=['deskripsi',
'suku',
'deskripsi'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property int $dari dari
@property int $sampai sampai
@property int $status status
   
 */
class TwebPendudukUmur extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_umur';

    /**
    * Mass assignable columns
    */
    protected $fillable=['status',
'nama',
'dari',
'sampai',
'status'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
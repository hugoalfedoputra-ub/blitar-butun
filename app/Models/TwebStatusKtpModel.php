<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property tinyint $ktp_el ktp el
@property varchar $status_rekam status rekam
   
 */
class TwebStatusKtp extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_status_ktp';

    /**
    * Mass assignable columns
    */
    protected $fillable=['status_rekam',
'nama',
'ktp_el',
'status_rekam'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
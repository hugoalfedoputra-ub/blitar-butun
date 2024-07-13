<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_pend id pend
@property varchar $id_cluster id cluster
@property timestamp $tanggal tanggal
   
 */
class LogPerubahanPendudukModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'log_perubahan_penduduk';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tanggal',
'id_pend',
'id_cluster',
'tanggal'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal'];




}
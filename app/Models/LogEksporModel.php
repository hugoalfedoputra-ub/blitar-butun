<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property timestamp $tgl_ekspor tgl ekspor
@property varchar $kode_ekspor kode ekspor
@property int $semua semua
@property date $dari_tgl dari tgl
@property int $total total
   
 */
class LogEksporModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'log_ekspor';

    /**
    * Mass assignable columns
    */
    protected $fillable=['total',
'tgl_ekspor',
'kode_ekspor',
'semua',
'dari_tgl',
'total'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_ekspor',
'dari_tgl'];




}
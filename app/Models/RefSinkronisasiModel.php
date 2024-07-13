<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $server server
@property tinyint $jenis_update jenis update
@property varchar $tabel_hapus tabel hapus
   
 */
class RefSinkronisasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'ref_sinkronisasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tabel_hapus',
'server',
'jenis_update',
'tabel_hapus'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property datetime $waktu waktu
@property tinyint $status status
@property text $keterangan keterangan
@property int $id_penduduk id penduduk
@property int $id_pamong id pamong
   
 */
class KehadiranPengaduanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'kehadiran_pengaduan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_pamong',
'waktu',
'status',
'keterangan',
'id_penduduk',
'id_pamong'];

    /**
    * Date time columns.
    */
    protected $dates=['waktu'];




}
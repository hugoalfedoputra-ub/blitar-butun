<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_hari nama hari
@property time $jam_masuk jam masuk
@property time $jam_keluar jam keluar
@property tinyint $status status
@property text $keterangan keterangan
   
 */
class KehadiranJamKerjaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'kehadiran_jam_kerja';

    /**
    * Mass assignable columns
    */
    protected $fillable=['keterangan',
'nama_hari',
'jam_masuk',
'jam_keluar',
'status',
'keterangan'];

    /**
    * Date time columns.
    */
    protected $dates=['jam_masuk',
'jam_keluar'];




}
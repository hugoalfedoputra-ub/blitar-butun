<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $tipe tipe
@property varchar $judul judul
@property int $tahun tahun
@property int $semester semester
@property varchar $nama_file nama file
@property datetime $kirim kirim
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class LaporanSinkronisasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'laporan_sinkronisasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tipe',
'judul',
'tahun',
'semester',
'nama_file',
'kirim'];

    /**
    * Date time columns.
    */
    protected $dates=['kirim'];




}
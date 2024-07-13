<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property varchar $telepon telepon
@property varchar $instansi instansi
@property tinyint $jenis_kelamin jenis kelamin
@property text $alamat alamat
@property varchar $bidang bidang
@property varchar $keperluan keperluan
@property varchar $foto foto
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class BukuTamuModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'buku_tamu';

    /**
    * Mass assignable columns
    */
    protected $fillable=['nama',
'telepon',
'instansi',
'jenis_kelamin',
'alamat',
'bidang',
'keperluan',
'foto'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
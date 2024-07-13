<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $judul judul
@property varchar $jenis jenis
@property int $sudah_dibaca sudah dibaca
@property int $diarsipkan diarsipkan
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class PesanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'pesan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['judul',
'jenis',
'sudah_dibaca',
'diarsipkan'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $pesan_id pesan id
@property text $text text
@property varchar $pengirim pengirim
@property varchar $nama_pengirim nama pengirim
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class PesanDetailModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'pesan_detail';

    /**
    * Mass assignable columns
    */
    protected $fillable=['pesan_id',
'text',
'pengirim',
'nama_pengirim'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
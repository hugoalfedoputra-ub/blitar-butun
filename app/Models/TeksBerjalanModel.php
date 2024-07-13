<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property mediumtext $teks teks
@property int $urut urut
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $status status
@property tinyint $tipe tipe
@property varchar $tautan tautan
@property varchar $judul_tautan judul tautan
   
 */
class TeksBerjalanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'teks_berjalan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['judul_tautan',
'teks',
'urut',
'created_by',
'updated_by',
'status',
'tipe',
'tautan',
'judul_tautan'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
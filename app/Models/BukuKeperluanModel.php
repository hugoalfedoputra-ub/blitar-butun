<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $keperluan keperluan
@property tinyint $status status
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class BukuKeperluanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'buku_keperluan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['keperluan',
'status'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
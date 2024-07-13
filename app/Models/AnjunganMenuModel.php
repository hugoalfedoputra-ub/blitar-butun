<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property text $icon icon
@property text $link link
@property tinyint $link_tipe link tipe
@property tinyint $urut urut
@property int $status status
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class AnjunganMenuModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'anjungan_menu';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'nama',
'icon',
'link',
'link_tipe',
'urut',
'status',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
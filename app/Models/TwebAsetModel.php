<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $golongan golongan
@property varchar $bidang bidang
@property varchar $kelompok kelompok
@property varchar $sub_kelompok sub kelompok
@property varchar $sub_sub_kelompok sub sub kelompok
@property varchar $nama nama
   
 */
class TwebAsetModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_aset';

    /**
    * Mass assignable columns
    */
    protected $fillable=['nama',
'golongan',
'bidang',
'kelompok',
'sub_kelompok',
'sub_sub_kelompok',
'nama'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $judul judul
@property varchar $key key
@property text $value value
@property varchar $keterangan keterangan
@property varchar $jenis jenis
@property mediumtext $option option
@property mediumtext $attribute attribute
@property varchar $kategori kategori
   
 */
class SettingAplikasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'setting_aplikasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['kategori',
'judul',
'key',
'value',
'keterangan',
'jenis',
'option',
'attribute',
'kategori'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
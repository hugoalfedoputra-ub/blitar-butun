<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $rt rt
@property varchar $rw rw
@property varchar $dusun dusun
@property int $id_kepala id kepala
@property varchar $lat lat
@property varchar $lng lng
@property int $zoom zoom
@property mediumtext $path path
@property varchar $map_tipe map tipe
@property varchar $warna warna
@property int $urut urut
@property int $urut_cetak urut cetak
   
 */
class TwebWilClusterdesa extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_wil_clusterdesa';

    /**
    * Mass assignable columns
    */
    protected $fillable=['urut_cetak',
'rt',
'rw',
'dusun',
'id_kepala',
'lat',
'lng',
'zoom',
'path',
'map_tipe',
'warna',
'urut',
'urut_cetak'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
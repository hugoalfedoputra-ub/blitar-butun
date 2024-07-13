<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nik nik
@property varchar $nama nama
@property tinyint $persil_jenis_id persil jenis id
@property int $id_clusterdesa id clusterdesa
@property decimal $luas luas
@property varchar $no_sppt_pbb no sppt pbb
@property varchar $kelas kelas
@property tinyint $persil_peruntukan_id persil peruntukan id
@property varchar $alamat_ext alamat ext
@property mediumint $userID userID
@property mediumtext $peta peta
@property timestamp $rdate rdate
   
 */
class DataPersilModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'data_persil';

    /**
    * Mass assignable columns
    */
    protected $fillable=['rdate',
'nik',
'nama',
'persil_jenis_id',
'id_clusterdesa',
'luas',
'no_sppt_pbb',
'kelas',
'persil_peruntukan_id',
'alamat_ext',
'userID',
'peta',
'rdate'];

    /**
    * Date time columns.
    */
    protected $dates=['rdate'];




}
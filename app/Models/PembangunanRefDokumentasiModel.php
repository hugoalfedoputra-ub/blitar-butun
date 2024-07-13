<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_pembangunan id pembangunan
@property varchar $gambar gambar
@property varchar $persentase persentase
@property varchar $keterangan keterangan
@property datetime $created_at created at
@property datetime $updated_at updated at
   
 */
class PembangunanRefDokumentasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'pembangunan_ref_dokumentasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_pembangunan',
'gambar',
'persentase',
'keterangan'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
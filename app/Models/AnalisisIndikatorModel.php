<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_master id master
@property varchar $nomor nomor
@property varchar $pertanyaan pertanyaan
@property tinyint $id_tipe id tipe
@property tinyint $bobot bobot
@property tinyint $act_analisis act analisis
@property int $id_kategori id kategori
@property tinyint $is_publik is publik
@property tinyint $is_teks is teks
@property varchar $referensi referensi
   
 */
class AnalisisIndikatorModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_indikator';

    /**
    * Mass assignable columns
    */
    protected $fillable=['referensi',
'id_master',
'nomor',
'pertanyaan',
'id_tipe',
'bobot',
'act_analisis',
'id_kategori',
'is_publik',
'is_teks',
'referensi'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
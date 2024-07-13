<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_subjek id subjek
@property int $id_master id master
@property int $id_periode id periode
@property int $id_klassifikasi id klassifikasi
   
 */
class AnalisisPartisipasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_partisipasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_klassifikasi',
'id_subjek',
'id_master',
'id_periode',
'id_klassifikasi'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
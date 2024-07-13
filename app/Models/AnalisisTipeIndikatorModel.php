<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $tipe tipe
   
 */
class AnalisisTipeIndikatorModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_tipe_indikator';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tipe',
'tipe'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
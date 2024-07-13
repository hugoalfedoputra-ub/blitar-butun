<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $subjek subjek
   
 */
class AnalisisRefSubjekModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_ref_subjek';

    /**
    * Mass assignable columns
    */
    protected $fillable=['subjek',
'subjek'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_parameter id parameter
@property int $id_subjek id subjek
@property int $id_periode id periode
   
 */
class AnalisisResponModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_respon';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_periode',
'id_parameter',
'id_subjek',
'id_periode'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_master id master
@property varchar $nama nama
@property double $minval minval
@property double $maxval maxval
   
 */
class AnalisisKlasifikasiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_klasifikasi';

    /**
    * Mass assignable columns
    */
    protected $fillable=['maxval',
'id_master',
'nama',
'minval',
'maxval'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
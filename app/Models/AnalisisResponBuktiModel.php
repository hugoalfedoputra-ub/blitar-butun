<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property tinyint $id_periode id periode
@property int $id_subjek id subjek
@property varchar $pengesahan pengesahan
@property timestamp $tgl_update tgl update
   
 */
class AnalisisResponBuktiModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'analisis_respon_bukti';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tgl_update',
'id_periode',
'id_subjek',
'pengesahan',
'tgl_update'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_update'];




}
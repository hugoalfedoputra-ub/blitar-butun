<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property tinyint $jenis jenis
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property \Illuminate\Database\Eloquent\Collection $grupAkse hasMany
   
 */
class UserGrup extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'user_grup';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'nama',
'jenis',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * grupAkses
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function grupAkses()
    {
        return $this->hasMany(GrupAkses::class,'id_grup');
    }



}
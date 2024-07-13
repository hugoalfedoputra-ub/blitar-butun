<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property varchar $slug slug
@property tinyint $sasaran sasaran
@property varchar $keterangan keterangan
@property \Illuminate\Database\Eloquent\Collection $suplemenTerdatum hasMany
   
 */
class SuplemenModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'suplemen';

    /**
    * Mass assignable columns
    */
    protected $fillable=['keterangan',
'nama',
'slug',
'sasaran',
'keterangan'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * suplemenTerdata
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function suplemenTerdata()
    {
        return $this->hasMany(SuplemenTerdatum::class,'id_suplemen');
    }



}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_master id master
@property int $id_ketua id ketua
@property varchar $nama nama
@property varchar $slug slug
@property varchar $keterangan keterangan
@property varchar $kode kode
@property varchar $tipe tipe
@property \Illuminate\Database\Eloquent\Collection $kelompokAnggotum hasMany
   
 */
class KelompokModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'kelompok';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tipe',
'id_master',
'id_ketua',
'nama',
'slug',
'keterangan',
'kode',
'tipe'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * kelompokAnggota
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function kelompokAnggota()
    {
        return $this->hasMany(KelompokAnggotum::class,'id_kelompok');
    }



}
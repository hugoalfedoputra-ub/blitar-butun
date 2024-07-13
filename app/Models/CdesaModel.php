<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nomor nomor
@property varchar $nama_kepemilikan nama kepemilikan
@property tinyint $jenis_pemilik jenis pemilik
@property varchar $nama_pemilik_luar nama pemilik luar
@property varchar $alamat_pemilik_luar alamat pemilik luar
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property \Illuminate\Database\Eloquent\Collection $cdesaPenduduk hasMany
@property \Illuminate\Database\Eloquent\Collection $mutasiCdesa hasMany
   
 */
class CdesaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'cdesa';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'nomor',
'nama_kepemilikan',
'jenis_pemilik',
'nama_pemilik_luar',
'alamat_pemilik_luar',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * cdesaPenduduks
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function cdesaPenduduks()
    {
        return $this->hasMany(CdesaPenduduk::class,'id_cdesa');
    }
    /**
    * mutasiCdesas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function mutasiCdesas()
    {
        return $this->hasMany(MutasiCdesa::class,'id_cdesa_masuk');
    }



}
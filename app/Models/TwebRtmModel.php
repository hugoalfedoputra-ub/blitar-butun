<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $nik_kepala nik kepala
@property varchar $no_kk no kk
@property timestamp $tgl_daftar tgl daftar
@property int $kelas_sosial kelas sosial
@property varchar $bdt bdt
@property tinyint $terdaftar_dtks terdaftar dtks
@property \Illuminate\Database\Eloquent\Collection $dtk hasMany
@property \Illuminate\Database\Eloquent\Collection $dtksLampiran hasMany
   
 */
class TwebRtm extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_rtm';

    /**
    * Mass assignable columns
    */
    protected $fillable=['terdaftar_dtks',
'nik_kepala',
'no_kk',
'tgl_daftar',
'kelas_sosial',
'bdt',
'terdaftar_dtks'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_daftar'];

    /**
    * dtks
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtks()
    {
        return $this->hasMany(Dtks::class,'id_rtm');
    }
    /**
    * dtksLampirans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtksLampirans()
    {
        return $this->hasMany(DtksLampiran::class,'id_rtm');
    }



}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $no_kk no kk
@property varchar $nik_kepala nik kepala
@property timestamp $tgl_daftar tgl daftar
@property int $kelas_sosial kelas sosial
@property datetime $tgl_cetak_kk tgl cetak kk
@property varchar $alamat alamat
@property int $id_cluster id cluster
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property \Illuminate\Database\Eloquent\Collection $dtk hasMany
@property \Illuminate\Database\Eloquent\Collection $dtksAnggotum hasMany
   
 */
class TwebKeluarga extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_keluarga';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'no_kk',
'nik_kepala',
'tgl_daftar',
'kelas_sosial',
'tgl_cetak_kk',
'alamat',
'id_cluster',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_daftar',
'tgl_cetak_kk'];

    /**
    * dtks
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtks()
    {
        return $this->hasMany(Dtks::class,'id_keluarga');
    }
    /**
    * dtksAnggota
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtksAnggota()
    {
        return $this->hasMany(DtksAnggota::class,'id_keluarga');
    }



}
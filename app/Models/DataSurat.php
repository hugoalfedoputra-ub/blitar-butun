<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $sex sex
@property varchar $tempatlahir tempatlahir
@property date $tanggallahir tanggallahir
@property double $umur umur
@property varchar $status_kawin status kawin
@property varchar $warganegara warganegara
@property varchar $agama agama
@property varchar $pendidikan pendidikan
@property varchar $pekerjaan pekerjaan
@property varchar $nik nik
@property varchar $rt rt
@property varchar $rw rw
@property varchar $dusun dusun
@property varchar $no_kk no kk
@property varchar $kepala_kk kepala kk
   
 */
class DataSurat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'data_surat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'kepala_kk',
        'nama',
        'sex',
        'tempatlahir',
        'tanggallahir',
        'umur',
        'status_kawin',
        'warganegara',
        'agama',
        'pendidikan',
        'pekerjaan',
        'nik',
        'rt',
        'rw',
        'dusun',
        'no_kk',
        'kepala_kk'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tanggallahir'];
}

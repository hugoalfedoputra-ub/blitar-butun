<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_master id master
@property varchar $nama nama
@property tinyint $id_state id state
@property tinyint $aktif aktif
@property varchar $keterangan keterangan
@property year $tahun_pelaksanaan tahun pelaksanaan
   
 */
class AnalisisPeriode extends Model
{

    /**
     * Database table name
     */
    protected $table = 'analisis_periode';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'tahun_pelaksanaan',
        'id_master',
        'nama',
        'id_state',
        'aktif',
        'keterangan',
        'tahun_pelaksanaan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

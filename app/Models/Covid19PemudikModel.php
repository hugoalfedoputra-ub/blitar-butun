<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_terdata id terdata
@property tinyint $pantau pantau
@property date $tanggal_datang tanggal datang
@property varchar $asal_mudik asal mudik
@property varchar $durasi_mudik durasi mudik
@property varchar $tujuan_mudik tujuan mudik
@property varchar $keluhan_kesehatan keluhan kesehatan
@property varchar $status_covid status covid
@property varchar $no_hp no hp
@property varchar $email email
@property varchar $keterangan keterangan
@property varchar $is_wajib_pantau is wajib pantau
@property IdTerdatum $twebPenduduk belongsTo
@property \Illuminate\Database\Eloquent\Collection $covid19Pantau hasMany
   
 */
class Covid19Pemudik extends Model
{

    /**
     * Database table name
     */
    protected $table = 'covid19_pemudik';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'is_wajib_pantau',
        'id_terdata',
        'pantau',
        'tanggal_datang',
        'asal_mudik',
        'durasi_mudik',
        'tujuan_mudik',
        'keluhan_kesehatan',
        'status_covid',
        'no_hp',
        'email',
        'keterangan',
        'is_wajib_pantau'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tanggal_datang'];

    /**
     * idTerdatum
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idTerdatum()
    {
        return $this->belongsTo(TwebPenduduk::class, 'id_terdata');
    }

    /**
     * covid19Pantaus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function covid19Pantaus()
    {
        return $this->hasMany(Covid19Pantau::class, 'id_pemudik');
    }
}

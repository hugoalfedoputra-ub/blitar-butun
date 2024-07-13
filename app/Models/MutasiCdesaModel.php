<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_cdesa_masuk id cdesa masuk
@property int $cdesa_keluar cdesa keluar
@property tinyint $jenis_mutasi jenis mutasi
@property date $tanggal_mutasi tanggal mutasi
@property text $keterangan keterangan
@property int $id_persil id persil
@property tinyint $no_bidang_persil no bidang persil
@property decimal $luas luas
@property varchar $no_objek_pajak no objek pajak
@property text $path path
@property int $id_peta id peta
@property IdCdesaMasuk $cdesa belongsTo
   
 */
class MutasiCdesa extends Model
{

    /**
     * Database table name
     */
    protected $table = 'mutasi_cdesa';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_peta',
        'id_cdesa_masuk',
        'cdesa_keluar',
        'jenis_mutasi',
        'tanggal_mutasi',
        'keterangan',
        'id_persil',
        'no_bidang_persil',
        'luas',
        'no_objek_pajak',
        'path',
        'id_peta'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tanggal_mutasi'];

    /**
     * idCdesaMasuk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idCdesaMasuk()
    {
        return $this->belongsTo(Cdesa::class, 'id_cdesa_masuk');
    }
}

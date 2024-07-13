<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kelompok Kelompok
@property varchar $Jenis Jenis
@property varchar $Nama_Jenis Nama Jenis
@property int $Formula Formula
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefRek3 extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_rek3';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Formula',
        'id_keuangan_master',
        'Kelompok',
        'Jenis',
        'Nama_Jenis',
        'Formula'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idKeuanganMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idKeuanganMaster()
    {
        return $this->belongsTo(KeuanganMaster::class, 'id_keuangan_master');
    }
}

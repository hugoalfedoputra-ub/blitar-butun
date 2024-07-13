<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kode Kode
@property varchar $Nama_Perangkat Nama Perangkat
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefPerangkat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_perangkat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Perangkat',
        'id_keuangan_master',
        'Kode',
        'Nama_Perangkat'
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

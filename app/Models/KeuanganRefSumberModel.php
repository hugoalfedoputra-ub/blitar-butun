<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kode Kode
@property varchar $Nama_Sumber Nama Sumber
@property varchar $Urut Urut
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefSumber extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_sumber';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Urut',
        'id_keuangan_master',
        'Kode',
        'Nama_Sumber',
        'Urut'
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

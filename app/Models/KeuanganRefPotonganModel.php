<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Kd_Potongan Kd Potongan
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefPotongan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_potongan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kd_Potongan',
        'id_keuangan_master',
        'Kd_Rincian',
        'Kd_Potongan'
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

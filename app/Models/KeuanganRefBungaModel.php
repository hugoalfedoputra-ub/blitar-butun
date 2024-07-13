<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Bunga Kd Bunga
@property varchar $Kd_Admin Kd Admin
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefBunga extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_bunga';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kd_Admin',
        'id_keuangan_master',
        'Kd_Bunga',
        'Kd_Admin'
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

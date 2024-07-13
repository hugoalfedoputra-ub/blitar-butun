<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $ID_Keg ID Keg
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefBelOperasional extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_bel_operasional';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'ID_Keg',
        'id_keuangan_master',
        'ID_Keg'
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

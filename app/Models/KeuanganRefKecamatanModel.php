<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Kec Kd Kec
@property varchar $Nama_Kecamatan Nama Kecamatan
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefKecamatan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_kecamatan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Kecamatan',
        'id_keuangan_master',
        'Kd_Kec',
        'Nama_Kecamatan'
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

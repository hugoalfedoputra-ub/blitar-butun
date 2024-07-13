<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Kec Kd Kec
@property varchar $Kd_Desa Kd Desa
@property varchar $Nama_Desa Nama Desa
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefDesa extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_desa';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Desa',
        'id_keuangan_master',
        'Kd_Kec',
        'Kd_Desa',
        'Nama_Desa'
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

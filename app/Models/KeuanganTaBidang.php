<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Bid Kd Bid
@property varchar $Nama_Bidang Nama Bidang
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaBidang extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_bidang';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Bidang',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'Kd_Bid',
        'Nama_Bidang'
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

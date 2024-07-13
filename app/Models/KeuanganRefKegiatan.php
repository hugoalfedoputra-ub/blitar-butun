<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Kd_Bid Kd Bid
@property varchar $ID_Keg ID Keg
@property varchar $Nama_Kegiatan Nama Kegiatan
@property tinyint $Jns_Kegiatan Jns Kegiatan
@property varchar $Kd_Sub Kd Sub
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefKegiatan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_kegiatan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Kd_Sub',
        'id_keuangan_master',
        'Kd_Bid',
        'ID_Keg',
        'Nama_Kegiatan',
        'Jns_Kegiatan',
        'Kd_Sub'
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

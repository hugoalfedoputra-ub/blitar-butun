<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $KdPosting KdPosting
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $No_Perdes No Perdes
@property varchar $TglPosting TglPosting
@property varchar $UserID UserID
@property varchar $Kunci Kunci
@property varchar $No_Perkades No Perkades
@property varchar $Petugas Petugas
@property varchar $Tanggal Tanggal
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaAnggaranLog extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_anggaran_log';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Tanggal',
        'id_keuangan_master',
        'KdPosting',
        'Tahun',
        'Kd_Desa',
        'No_Perdes',
        'TglPosting',
        'UserID',
        'Kunci',
        'No_Perkades',
        'Petugas',
        'Tanggal'
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

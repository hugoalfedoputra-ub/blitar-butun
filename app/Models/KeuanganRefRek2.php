<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Akun Akun
@property varchar $Kelompok Kelompok
@property varchar $Nama_Kelompok Nama Kelompok
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefRek2 extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_rek2';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Kelompok',
        'id_keuangan_master',
        'Akun',
        'Kelompok',
        'Nama_Kelompok'
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

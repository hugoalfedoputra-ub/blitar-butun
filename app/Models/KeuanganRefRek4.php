<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Jenis Jenis
@property varchar $Obyek Obyek
@property varchar $Nama_Obyek Nama Obyek
@property varchar $Peraturan Peraturan
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefRek4 extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ref_rek4';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Peraturan',
        'id_keuangan_master',
        'Jenis',
        'Obyek',
        'Nama_Obyek',
        'Peraturan'
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

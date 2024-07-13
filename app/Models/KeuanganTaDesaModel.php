<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Nm_Kades Nm Kades
@property varchar $Jbt_Kades Jbt Kades
@property varchar $Nm_Sekdes Nm Sekdes
@property varchar $NIP_Sekdes NIP Sekdes
@property varchar $Jbt_Sekdes Jbt Sekdes
@property varchar $Nm_Kaur_Keu Nm Kaur Keu
@property varchar $Jbt_Kaur_Keu Jbt Kaur Keu
@property varchar $Nm_Bendahara Nm Bendahara
@property varchar $Jbt_Bendahara Jbt Bendahara
@property varchar $No_Perdes No Perdes
@property varchar $Tgl_Perdes Tgl Perdes
@property varchar $No_Perdes_PB No Perdes PB
@property varchar $Tgl_Perdes_PB Tgl Perdes PB
@property varchar $No_Perdes_PJ No Perdes PJ
@property varchar $Tgl_Perdes_PJ Tgl Perdes PJ
@property varchar $Alamat Alamat
@property varchar $Ibukota Ibukota
@property varchar $Status Status
@property varchar $NPWP NPWP
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaDesa extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_desa';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'NPWP',
        'id_keuangan_master',
        'Tahun',
        'Kd_Desa',
        'Nm_Kades',
        'Jbt_Kades',
        'Nm_Sekdes',
        'NIP_Sekdes',
        'Jbt_Sekdes',
        'Nm_Kaur_Keu',
        'Jbt_Kaur_Keu',
        'Nm_Bendahara',
        'Jbt_Bendahara',
        'No_Perdes',
        'Tgl_Perdes',
        'No_Perdes_PB',
        'Tgl_Perdes_PB',
        'No_Perdes_PJ',
        'Tgl_Perdes_PJ',
        'Alamat',
        'Ibukota',
        'Status',
        'NPWP'
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

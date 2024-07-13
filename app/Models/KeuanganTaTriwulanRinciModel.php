<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_keuangan_master id keuangan master
@property varchar $KdPosting KdPosting
@property varchar $KURincianSD KURincianSD
@property varchar $Tahun Tahun
@property varchar $Sifat Sifat
@property varchar $SumberDana SumberDana
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Keg Kd Keg
@property varchar $Kd_Rincian Kd Rincian
@property varchar $Anggaran Anggaran
@property varchar $AnggaranPAK AnggaranPAK
@property varchar $Tw1Rinci Tw1Rinci
@property varchar $Tw2Rinci Tw2Rinci
@property varchar $Tw3Rinci Tw3Rinci
@property varchar $Tw4Rinci Tw4Rinci
@property varchar $KunciData KunciData
@property varchar $Jan Jan
@property varchar $Peb Peb
@property varchar $Mar Mar
@property varchar $Apr Apr
@property varchar $Mei Mei
@property varchar $Jun Jun
@property varchar $Jul Jul
@property varchar $Agt Agt
@property varchar $Sep Sep
@property varchar $Okt Okt
@property varchar $Nop Nop
@property varchar $Des Des
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaTriwulanRinci extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_ta_triwulan_rinci';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Des',
        'id_keuangan_master',
        'KdPosting',
        'KURincianSD',
        'Tahun',
        'Sifat',
        'SumberDana',
        'Kd_Desa',
        'Kd_Keg',
        'Kd_Rincian',
        'Anggaran',
        'AnggaranPAK',
        'Tw1Rinci',
        'Tw2Rinci',
        'Tw3Rinci',
        'Tw4Rinci',
        'KunciData',
        'Jan',
        'Peb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agt',
        'Sep',
        'Okt',
        'Nop',
        'Des'
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $Kd_Bid Kd Bid
@property varchar $Nama_Bidang Nama Bidang
   
 */
class KeuanganManualRefBidang extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_manual_ref_bidang';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Bidang',
        'Kd_Bid',
        'Nama_Bidang'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

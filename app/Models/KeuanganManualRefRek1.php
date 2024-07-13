<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $Akun Akun
@property varchar $Nama_Akun Nama Akun
   
 */
class KeuanganManualRefRek1 extends Model
{

    /**
     * Database table name
     */
    protected $table = 'keuangan_manual_ref_rek1';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Nama_Akun',
        'Akun',
        'Nama_Akun'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

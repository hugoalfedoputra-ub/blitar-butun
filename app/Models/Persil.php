<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nomor nomor
@property smallint $nomor_urut_bidang nomor urut bidang
@property int $kelas kelas
@property decimal $luas_persil luas persil
@property int $id_wilayah id wilayah
@property text $lokasi lokasi
@property text $path path
@property int $cdesa_awal cdesa awal
@property int $id_peta id peta
   
 */
class Persil extends Model
{

    /**
     * Database table name
     */
    protected $table = 'persil';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_peta',
        'nomor',
        'nomor_urut_bidang',
        'kelas',
        'luas_persil',
        'id_wilayah',
        'lokasi',
        'path',
        'cdesa_awal',
        'id_peta'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

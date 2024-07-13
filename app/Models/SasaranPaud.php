<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $posyandu_id posyandu id
@property int $kia_id kia id
@property tinyint $kategori_usia kategori usia
@property tinyint $januari januari
@property tinyint $februari februari
@property tinyint $maret maret
@property tinyint $april april
@property tinyint $mei mei
@property tinyint $juni juni
@property tinyint $juli juli
@property tinyint $agustus agustus
@property tinyint $september september
@property tinyint $oktober oktober
@property tinyint $november november
@property tinyint $desember desember
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class SasaranPaud extends Model
{

    /**
     * Database table name
     */
    protected $table = 'sasaran_paud';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'posyandu_id',
        'kia_id',
        'kategori_usia',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}

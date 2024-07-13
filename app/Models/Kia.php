<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $no_kia no kia
@property int $ibu_id ibu id
@property int $anak_id anak id
@property date $hari_perkiraan_lahir hari perkiraan lahir
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class Kia extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kia';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'no_kia',
        'ibu_id',
        'anak_id',
        'hari_perkiraan_lahir',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['hari_perkiraan_lahir'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property \Illuminate\Database\Eloquent\Collection $logPenduduk hasMany
   
 */
class RefPindah extends Model
{

    /**
     * Database table name
     */
    protected $table = 'ref_pindah';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'nama',
        'nama'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * logPenduduks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logPenduduks()
    {
        return $this->hasMany(LogPenduduk::class, 'ref_pindah');
    }
}

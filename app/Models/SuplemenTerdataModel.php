<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_suplemen id suplemen
@property varchar $id_terdata id terdata
@property tinyint $sasaran sasaran
@property varchar $keterangan keterangan
@property IdSupleman $supleman belongsTo
   
 */
class SuplemenTerdata extends Model
{

    /**
     * Database table name
     */
    protected $table = 'suplemen_terdata';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'keterangan',
        'id_suplemen',
        'id_terdata',
        'sasaran',
        'keterangan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idSupleman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idSupleman()
    {
        return $this->belongsTo(Suplemen::class, 'id_suplemen');
    }
}

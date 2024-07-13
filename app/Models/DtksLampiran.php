<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_rtm id rtm
@property varchar $judul judul
@property varchar $keterangan keterangan
@property mediumtext $foto foto
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property IdRtm $twebRtm belongsTo
@property \Illuminate\Database\Eloquent\Collection $dtksRefLampiran hasMany
   
 */
class DtksLampiran extends Model
{

    /**
     * Database table name
     */
    protected $table = 'dtks_lampiran';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_rtm',
        'judul',
        'keterangan',
        'foto'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idRtm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idRtm()
    {
        return $this->belongsTo(TwebRtm::class, 'id_rtm');
    }

    /**
     * dtksRefLampirans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dtksRefLampirans()
    {
        return $this->hasMany(DtksRefLampiran::class, 'id_lampiran');
    }
}

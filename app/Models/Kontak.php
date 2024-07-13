<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $telepon telepon
@property varchar $email email
@property varchar $telegram telegram
@property varchar $hubung_warga hubung warga
@property text $keterangan keterangan
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property \Illuminate\Database\Eloquent\Collection $anggotagrup belongsToMany
   
 */
class Kontak extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kontak';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'nama',
        'telepon',
        'email',
        'telegram',
        'hubung_warga',
        'keterangan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * anggotagrups
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function anggotagrups()
    {
        return $this->belongsToMany(AnggotaGrupKontak::class, 'anggota_grup_kontak');
    }
}

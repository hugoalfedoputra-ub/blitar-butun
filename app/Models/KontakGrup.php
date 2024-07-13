<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama_grup nama grup
@property text $keterangan keterangan
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property \Illuminate\Database\Eloquent\Collection $anggotagrupkontak belongsToMany
@property \Illuminate\Database\Eloquent\Collection $hubungWarga hasMany
   
 */
class KontakGrup extends Model
{

    /**
     * Database table name
     */
    protected $table = 'kontak_grup';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'nama_grup',
        'keterangan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * anggotagrupkontaks
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function anggotagrupkontaks()
    {
        return $this->belongsToMany(Anggotagrupkontak::class, 'anggota_grup_kontak');
    }
    /**
     * hubungWargas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hubungWargas()
    {
        return $this->hasMany(HubungWarga::class, 'id_grup');
    }
}
